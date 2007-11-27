<?php

class PHPT_CodeRunner_Driver_Proc extends PHPT_CodeRunner_Driver_Abstract
{
    private $_pipes_template = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'),
        2 => array('pipe', 'w'),
        3 => array('pipe', 'w'), // pipe to write exit code to
    );

    private $_pipes = array();
    private $_process = null;

    public function run($filename)
    {
        $this->filename = $filename;
        
        $result = new PHPT_CodeRunner_Result();
        $result->filename = $filename;
        
        $this->_runCode();
        $this->_handleInput();
        
        $result->output = $this->_waitForAndRetrieveOutput();
        $result->exitcode = $this->_exitAndGetCode();
        
        return $result;
    }

    private function _runCode()
    {
        $this->_process = proc_open(
            $this->_fetchCommandLine(),
            $this->_pipes_template,
            $this->_pipes,
            null,
            $this->environment,
            array(
            //    'supress_errors' => true,
            )
        );

        // @todo figure out how to test
        if ($this->_process == false) {
            throw new PHPT_Exception_InvalidStateException(
                'proc_open returned false in ' . __METHOD__
            );
        }
    }

    private function _fetchCommandLine()
    {
        $command = new PHPT_CodeRunner_CommandLine($this);
        if (!empty($this->command_line)) {
            $command->executable = $this->command_line;
        }

        return (string)$command  . ' ; echo $? >&3';
    }

    private function _handleInput()
    {
        if (!is_null($this->stdin)) {
            fwrite($this->_pipes[0], (string)$this->stdin);
        }
        fclose($this->_pipes[0]);
    }

    private function _waitForAndRetrieveOutput()
    {
        $data = '';
        while (true) {
            /* hide errors from interrupted syscalls */
            $read = array($this->_pipes[1]);
            $except = $write = null;
            $n = stream_select($read, $write, $except, $this->timeout);
            
            if ($n === 0) {
                proc_terminate($this->_process);
                throw new PHPT_CodeRunner_TimeoutException($this->_caller);
                
            } elseif ($n > 0) {
                $error_pipe = fread($this->_pipes[2], 8192);
                if (!empty($error_pipe)) {
                    throw new PHPT_CodeRunner_ExecutionException($error_pipe);
                }

                $line = fread($this->_pipes[1], 8192);
                if (strlen($line) == 0) {
                    /* EOF */
                    fclose($this->_pipes[1]);
                    break;
                }
                $data .= $line;
            }
        }
        return $data;
    }

    private function _exitAndGetCode()
    {
        $exitcode = trim(fread($this->_pipes[3], 5));
        fclose($this->_pipes[3]);
        $close = proc_close($this->_process);
        if (empty($exitcode)) { $exitcode = $close; }
        return $exitcode;
    }
    
    public function validate()
    {
        if ($this->executable{0} == DIRECTORY_SEPARATOR) {
            $info = new SplFileInfo($this->executable);
            if ($info->isExecutable() == false) {
                throw new PHPT_CodeRunner_InvalidExecutableException(
                    'unable to locate PHP executable: ' . $this->executable
                );
            }
        }
        $paths = explode(PATH_SEPARATOR, PHPT_Registry::getInstance()->path);
        $found = false;
        foreach ($paths as $path) {
            $info = new SplFileInfo($path . '/' . $this->executable);
            if ($info->isExecutable() == true) {
                $found = true;
                break;
            }
        }
        if ($found == false) {
            throw new PHPT_CodeRunner_InvalidExecutableException(
                'unable to locate PHP executable: ' . $this->executable
            );
        }
    }
}

class PHPT_CodeRunner_InvalidExecutableException  extends Exception { }
