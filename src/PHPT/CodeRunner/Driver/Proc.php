<?php

class PHPT_CodeRunner_Driver_Proc extends PHPT_CodeRunner_Driver_Abstract
{
    public function run($filename)
    {
        $this->filename = $filename;
        
        $result = new PHPT_CodeRunner_Result();
        $result->filename = $filename;
        
        $command = new PHPT_CodeRunner_CommandLine($this);
        if (!empty($this->command_line)) {
            $command->executable = $this->command_line;
        }
        
        $proc = proc_open(
            (string)$command . ' ; echo $? >&3',
            array(
                0 => array('pipe', 'r'),
                1 => array('pipe', 'w'),
                2 => array('pipe', 'w'),
                3 => array('pipe', 'w'), // pipe to write exit code to
            ),
            $pipes,
            null,
            $this->environment,
            array(
            //    'supress_errors' => true,
            )
        );
        
        // @todo figure out how to test
        if ($proc == false) {
            throw new PHPT_Exception_InvalidStateException(
                'proc_open returned false in ' . __METHOD__
            );
        }
        
        if (!is_null($this->stdin)) {
            fwrite($pipes[0], (string)$this->stdin);
        }
        fclose($pipes[0]);
        
        $data = '';
        
        while (true) {
            /* hide errors from interrupted syscalls */
            $read = $pipes;
            $except = $write = null;
            $n = @stream_select($read, $write, $except, $this->timeout);
            
            if ($n === 0) {
                proc_terminate($proc);
                throw new PHPT_CodeRunner_TimeoutException($this->_caller);
                
            } elseif ($n > 0) {
                $error_pipe = fread($pipes[2], 8192);
                if (!empty($error_pipe)) {
                    throw new PHPT_CodeRunner_ExecutionException($error_pipe);
                }

                $line = fread($pipes[1], 8192);
                if (strlen($line) == 0) {
                    /* EOF */
                    fclose($pipes[1]);
                    break;
                }
                $data .= $line;
            }
        }
    
        $exitcode = trim(fread($pipes[3], 5));
        fclose($pipes[3]);
        
        proc_close($proc);
        
        $result->output = $data;
        $result->exitcode = $exitcode;
        return $result;
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
