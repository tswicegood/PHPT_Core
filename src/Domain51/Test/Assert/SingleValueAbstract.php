<?php

require_once 'Domain51/Test/Assertion.php';

abstract class Domain51_Test_Assert_SingleValueAbstract implements Domain51_Test_Assertion
{
    protected $_message = '';
    protected $_value = null;
    protected $_comparison = array(
        0 => 'is not',
        1 => 'is',
    );
    
    public function __construct($value, $message = null)
    {
        $this->_value = $value;
        if (!is_null($message)) {
            $this->_message = $message;
        }
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