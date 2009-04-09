<?php

class PHPT_Section_FILE extends PHPT_Section_ModifiableAbstract
{
    public $leave_file = false;
    
    private $_contents = '';
    private $_filename = '';
    private $_runner_factory = null;
    private $_result = null;
    
    public function __construct($data)
    {
        parent::__construct($data);
        $this->_contents = $data;
        $this->_runner_factory = new PHPT_CodeRunner_Factory();
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
        if ($key == 'result') {
            return $this->_result;
        }
    }
    
    public function run(PHPT_Case $case)
    {
        parent::run($case);
        $this->filename = dirname($case->filename) . '/' . basename($case->filename, '.phpt') . '.php';
        $this->_result = $this->_runner_factory->factory($case)->run($this->_filename);
        $case->output = $this->_result->output;
    }
    
    public function getPriority()
    {
        
    }
}
