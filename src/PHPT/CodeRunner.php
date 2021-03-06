<?php

class PHPT_CodeRunner
{
    private $_driver = null;
    
    public function __construct($type = null)
    {
        if (is_null($type)) {
            $type = strtoupper(substr(PHP_OS, 0, 3)) == 'WIN' ? 'WScriptShell' : 'Proc';
        }
        $runner_name = 'PHPT_CodeRunner_Driver_' . $type;
        $this->_driver = new $runner_name($this);
    }
    
    public function __set($key, $value)
    {
        $this->_driver->$key = $value;
    }
    
    public function __get($key)
    {
        return $this->_driver->$key;
    }
    
    public function run($filename)
    {
        return $this->_driver->run($filename);
    }
    
    public function validate()
    {
        $this->_driver->validate();
    }
}
