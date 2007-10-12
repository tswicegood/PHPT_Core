<?php

class PHPT_Registry
{
    private static $_instance = null;
    private $_data = array();
    
    public function __construct()
    {
        $this->path = dirname(getenv('_'));
    }
    
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function __set($key, $value)
    {
        $this->_data[$key] = $value;
    }
    
    public function __get($key)
    {
        return $this->_data[$key];
    }
    
    public function __isset($key)
    {
        return isset($this->_data[$key]);
    }
    
    public function __unset($key)
    {
        unset($this->_data[$key]);
    }
}
