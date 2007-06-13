<?php

require_once 'Test/Util.php';

abstract class Test_Section
{
    private $_name = '';
    private $_php  = '';
    private $_php_fragment = '';
    
    public function __construct($name, $php)
    {
        $this->_name = $name;
        $this->_php = $php;
        $this->_php_fragment = Test_Util::parse($this->_php);
    }
    
    public function __get($key)
    {
        $key = "_{$key}";
        return $this->$key;
    }
}