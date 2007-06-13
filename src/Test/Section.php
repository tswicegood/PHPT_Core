<?php

require_once 'Test/Util.php';

abstract class Test_Section
{
    private $_name = '';
    private $_php  = '';
    private $_php_fragment = '';
    
    /**
     * Type of section this object represents
     *
     * Valid types are:
     *  - modify    is given source prior to run so it can modify it
     *  - compare   is given results and expected to throw an exception if there's an error
     */
    protected $_type = '';
    
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
    
    abstract public function run($input);
}
