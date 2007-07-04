<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_False implements Domain51_Test_Assertion
{
    private $_value = null;
    private $_message = 'value [%s] %s false';
    
    public function __construct($value, $message = null)
    {
        $this->_value = $value;
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return $this->_value == false;
    }
    public function getMessage()
    {
        return sprintf($this->_message,
                       var_export($this->_value, true),
                       $this->getStatus() ? 'is' : 'is not'
                      );
    }
}