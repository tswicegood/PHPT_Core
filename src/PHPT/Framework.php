<?php

class PHPT_Framework
{
    static private $namespace_length = null;
    static private $base_path = null;
    
    public function __construct()
    {
        
    }
    
    // @todo add some sort of error handling
    public static function autoload($class)
    {
        if (is_null(self::$namespace_length)) {
            self::$namespace_length = strlen(substr(__CLASS__, 0, -9));
            self::$base_path = dirname(__FILE__);
        }
        
        $class_name_without_namespace = substr($class, self::$namespace_length);
        @include self::$base_path . '/' . str_replace('_', '/', $class_name_without_namespace) . '.php';
    }
}

spl_autoload_register(array('PHPT_Framework', 'autoload'));
