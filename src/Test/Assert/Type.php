<?php

require_once 'Test/Assertion.php';

class Test_Assert_Type implements Test_Assertion
{
    private $_value = null;
    private $_type = null;
    
    public function __construct($value, $type)
    {
        $this->_value = $value;
        $this->_type = $type;
    }
    
    public function getStatus()
    {
        switch ($this->_type) {
            case 'boolean' :
                return is_bool($this->_value);
            
            case 'array' :
                return is_array($this->_value);
            
            case 'int' :
            case 'integer' :
            case 'long' :
                return is_int($this->_value);
            
            case 'numeric' :
                return is_numeric($this->_value);
            
            case 'float' :
            case 'double' :
            case 'real' :
                return is_float($this->_value);
            
            case 'string' :
                return is_string($this->_value);
            
            case 'scalar' :
                return is_scalar($this->_value);
            
            case 'null' :
                return is_null($this->_value);
            
            case 'object' :
                return is_object($this->_value);
            
            case 'resource' :
                return is_resource($this->_value);
            
            // assume we have a specific type of object, if there's no known matching type
            default:
                return $this->_value instanceof $this->_type;
        }
    }
    
    public function getMessage()
    {
        if (is_array($this->_value)) {
            $value = str_replace(array("\n", '   '), " ", var_export($this->_value, true));
        } elseif (is_object($this->_value)) {
            $value = 'object: ' . get_class($this->_value);
        } elseif (is_resource($this->_value)) {
            $value = 'resource';
        } else {
            $value = var_export($this->_value, true);
        }
        
        $status = $this->getStatus() ? 'is' : 'is not';
        return "value [{$value}] {$status} a [{$this->_type}]";
    }
}