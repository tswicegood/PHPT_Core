<?php

require_once 'Test/Assert/True.php';
require_once 'Test/Reporter.php';

class Test_AssertionHandler
{
    private $_reporter = null;
    
    public function __construct(Test_Reporter $reporter = null)
    {
        $this->_reporter = $reporter;
    }
    
    public function assertTrue($value, $message = 'value [true] is true')
    {
        $assertion = new Test_Assert_True($value, $message);
        if ($assertion->getStatus()) {
            $this->_reporter->onSuccess($assertion);
        } else {
            $this->_reporter->onFailure($assertion);
        }
    }
}