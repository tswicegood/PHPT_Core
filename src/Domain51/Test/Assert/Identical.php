<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_Identical implements Domain51_Test_Assertion
{
    private $_one = null;
    private $_two = null;
    private $_message = 'values [%s] and [%s] %s identical';
    
    public function __construct($one, $two, $message = null)
    {
        $this->_one = $one;
        $this->_two = $two;
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return $this->_one === $this->_two;
    }
    
    public function getMessage()
    {
        return sprintf($this->_message,
                       var_export($this->_one, true),
                       var_export($this->_two, true),
                       $this->getStatus() ? 'are' : 'are not'
                      );
    }
}