<?php

class PHPT_Assert_Type implements PHPT_Assertion
{
    private $_type = '';
    private $_value = null;
    
    public function __construct($type, $value)
    {
        $this->_type = $type;
        $this->_value = $value;
    }
    
    /**
     * @todo consider Strategy pattern implementation for this assertion
     */
    public function getStatus()
    {
        switch ($this->_type) {
            case 'array' :
                return is_array($this->_value);
            
            case 'bool' :
                return is_bool($this->_value);
            
            case 'callable' :
                return is_callable($this->_value);
            
            case 'double' :
            case 'float' :
            case 'real' :
                return is_float($this->_value);
            
            case 'int' :
            case 'integer' :
            case 'long' :
                return is_int($this->_value);
            
            case 'null' :
                return is_null($this->_value);
            
            case 'numeric' :
                return is_numeric($this->_value);
            
            case 'object' :
                return is_object($this->_value);
            
            case 'resource' :
                return is_resource($this->_value);
            
            case 'scalar' :
                return is_scalar($this->_value);
            
            case 'string' :
                return is_string($this->_value);
            
            default :
                return $this->_value instanceof $this->_type;
        }
    }
    
    public function getMessage()
    {
        return sprintf(
            'value [%s] %s a type of %s',
            (string)new PHPT_Util_ValueDumper($this->_value),
            $this->getStatus() ? 'is' : 'is not',
            $this->_type
        );
    }
    
    public function getName()
    {
        return 'assertType';
    }
}
