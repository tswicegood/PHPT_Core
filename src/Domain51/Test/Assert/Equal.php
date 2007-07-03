<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_Equal implements Domain51_Test_Assertion
{
    private $_one = null;
    private $_two = null;
    private $_message = 'values [%s] and [%s] %s equal';
    
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
        return $this->_one == $this->_two;
    }
    public function getMessage()
    {
        return sprintf($this->_message,
                       $this->_one,
                       $this->_two,
                       $this->getStatus() ? 'are' : 'are not'
                      );
    }
}