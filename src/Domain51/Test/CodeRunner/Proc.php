<?php

class Domain51_Test_CodeRunner_Proc
{
    private $_caller = null;
    
    public $command_line = 'php';
    public $environment = array();
    public $timeout = 60;
    public $ini = null;
    public $stdin = null;
    public $args = null;
    
    public function __construct(Domain51_Test_CodeRunner $caller)
    {
        $this->_caller = $caller;
    }
    
    public function run($filename)
    {
        $result = new Domain51_Test_CodeRunner_Result();
        $result->filename = $filename;
        
        $proc = proc_open(
            "{$this->command_line} {$this->ini} -f {$filename} {$this->args}",
            array(
                0 => array('pipe', 'r'),
                1 => array('pipe', 'w'),
                2 => array('pipe', 'w'),
            ),
            $pipes,
            null,
            $this->environment,
            array(
            //    'supress_errors' => true,
            )
        );
        
        // @todo figure out how to test
        if ($proc === false) {
            throw new Domain51_Test_Exception_InvalidStateException(
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
                throw new Domain51_Test_CodeRunner_TimeoutException($this->_caller);
                
            } elseif ($n > 0) {
                $error_pipe = fread($pipes[2], 8192);
                if (!empty($error_pipe)) {
                    throw new Domain51_Test_CodeRunner_ExecutionException($error_pipe);
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
    
        //$stat = proc_get_status($proc);
        $exitcode = proc_close($proc);
        
        $result->output = $data;
        $result->exitcode = $exitcode;
        return $result;
    }
}