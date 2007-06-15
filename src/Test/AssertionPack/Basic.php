<?php

require_once 'Test/Assert/True.php';
require_once 'Test/Reporter.php';

class Test_AssertionPack_Basic
{
    private $_reporter = null;
    
    public function __construct()
    {
        
    }
    
    public function setReporter(Test_Reporter $reporter)
    {
        $this->_reporter = $reporter;
    }
    
    public function assertTrue($value, $message = null)
    {
        $assertion = new Test_Assert_True($value, $message);
        if ($assertion->getStatus()) {
            $this->_reporter->onSuccess($assertion);
            return true;
        } else {
            $this->_reporter->onFailure($assertion);
            return false;
        }
    }
}