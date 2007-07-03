<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_NotEqual implements Domain51_Test_Assertion
{
    private $_one;
    private $_two;
    private $_message;
    
    public function __construct($one, $two, $message = null)
    {
        $this->_one = $one;
        $this->_two = $two;
        $this->_message = $message;
    }
    
    public function getStatus()
    {
        return $this->_one != $this->_two;
    }
    
    public function getMessage()
    {
        if (!is_null($this->_message)) {
            return $message;
        }
        
        $message = 'value [%s] %s equal to [%s]';
        return sprintf($message,
                       $this->_one,
                       $this->getStatus() ? 'is not' : 'is',
                       $this->_two
                      );
    }
}