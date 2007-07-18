<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_Null implements Domain51_Test_Assertion
{
    private $_message = 'value [%s] %s null';
    private $_value = null;
    
    public function __construct($value, $message = null)
    {
        $this->_value = $value;
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return is_null($this->_value);
    }
    
    public function getMessage()
    {
        return sprintf(
            $this->_message,
            var_export($this->_value, true),
            $this->getStatus() ? 'is' : 'is not'
        );
    }
}