<?php

require_once 'Test/Assertion.php';

class Test_Assert_True implements Test_Assertion
{
    private $_message = null;
    private $_status = false;
    private $_value = null;
    
    public function __construct($value, $message = null)
    {
        $this->_message = $message;
        $this->_value = $value;
        $this->_status = (bool)$value;
    }
    
    public function getStatus()
    {
        return $this->_status;
    }
    
    public function getMessage()
    {
        if (!is_null($this->_message)) {
            $value = var_export($this->_value, true);
            return sprintf($this->_message, $value);
        }
        
        if ($this->getStatus()) {
           return 'value [' . var_export($this->_value, true) . '] is true';
        } else {
            if (is_array($this->_value)) {
                $value = str_replace("\n", '', var_export($this->_value, true));
            } else {
                $value = var_export($this->_value, true);
            }
            return 'value [' . $value . '] is not true';
        }
    }
}