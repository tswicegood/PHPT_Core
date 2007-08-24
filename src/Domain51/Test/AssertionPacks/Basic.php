<?php

require_once 'Domain51/Loader.php';

class Domain51_Test_AssertionPacks_Basic
{
    private $_recorder = null;
    
    public function __construct($recorder)
    {
        $this->_recorder = $recorder;
    }
    
    public function declared()
    {
        return array(
            'assertTrue',
            'assertFalse',
            'assertNull',
            'assertType',
            'assertEqual',
            'assertNotEqual',
            'assertIdentical',
            'assertNotIdentical',
            'assertRegExp',
            'assertNotRegExp',
        );
    }
    
    public function assertTrue($value, $message = null)
    {
        $assertion = new Domain51_Test_Assert_True($value, $message = null);
        $this->_record($assertion);
    }
    
    public function assertFalse($value, $message = null)
    {
        $this->_record(
            new Domain51_Test_Assert_False($value, $message = null)
        );
    }
    
    public function assertNull($value, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_Null($value, $message));
    }
    
    public function assertType($type, $value, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_Type($type, $value, $message));
    }
    
    public function assertEqual($one, $two, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_Equal($one, $two, $message));
    }
    
    public function assertNotEqual($one, $two, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_NotEqual($one, $two, $message));
    }
    
    public function assertIdentical($one, $two, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_Identical($one, $two, $message));
    }
    
    public function assertNotIdentical($one, $two, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_NotIdentical($one, $two, $message));
    }
    
    public function assertRegExp($pattern, $value, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_RegExp($pattern, $value, $message));
    }
    
    public function assertNotRegExp($pattern, $value, $message = null)
    {
        $this->_record(new Domain51_Test_Assert_NotRegExp($pattern, $value, $message));
    }
    
    private function _record(Domain51_Test_Assertion $assertion)
    {
        if ($assertion->getStatus()) {
            $this->_recorder->onSuccess($assertion);
        } else {
            $this->_recorder->onFailure($assertion);
        }
    }
}