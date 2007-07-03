<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_Equal implements Domain51_Test_Assertion
{
    private $_one = null;
    private $_two = null;
    private $_message = null;
    
    public function __construct($one, $two, $message = null)
    {
        $this->_one = $one;
        $this->_two = $two;
        $this->_message = $message;
    }
    
    public function getStatus()
    {
        return $this->_one == $this->_two;
    }
    public function getMessage()
    {
        if (!is_null($this->_message)) {
            return $this->_message;
        }
        
        $message = "value [%s] %s [%s]";
        return sprintf($message,
                       $this->_one,
                       $this->getStatus() ? 'equal to' : 'not equal to',
                       $this->_two
                      );
    }
}