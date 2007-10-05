<?php

class PHPT_CodeRunner
{
    private $_runner = null;
    
    public function __construct($type = 'Proc')
    {
        $runner_name = 'PHPT_CodeRunner_' . $type;
        $this->_runner = new $runner_name($this);
    }
    
    public function __set($key, $value)
    {
        $this->_runner->$key = $value;
    }
    
    public function __get($key)
    {
        return $this->_runner->$key;
    }
    
    public function run($filename)
    {
        return $this->_runner->run($filename);
    }
}
