<?php

class PHPT_Section_File implements PHPT_Section_Runnable
{
    public $leave_file = false;
    
    private $_contents = '';
    private $_filename = '';
    private $_runner = null;
    
    public function __construct($data)
    {
        $this->_contents = $data;
        $this->_runner = new PHPT_CodeRunner();
    }
    
    public function __destruct()
    {
        if ($this->leave_file == false) {
            @unlink($this->_filename);
        }
    }
    
    public function __set($key, $value)
    {
        $trigger_update = false;
        if ($key == 'filename') {
            $this->_filename = $value;
            $trigger_update = true;
        } elseif ($key == 'contents') {
            $this->_contents = $value;
            $trigger_update = true;
        }
        
        if ($trigger_update) {
            file_put_contents($this->_filename, $this->contents);
        }
    }
    
    public function __get($key)
    {
        if ($key == 'contents') {
            return $this->_contents;
        }
        if ($key == 'filename') {
            return $this->_filename;
        }
    }
    
    public function run(PHPT_Case $case)
    {
        $case->output = $this->_runner->run($this->_filename)->output;
    }
}
