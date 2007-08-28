<?php

require_once 'Domain51/Loader.php';

class Domain51_Test_AssertionPacks_Basic
{
    private $_recorder = null;
    
    public function __construct()
    {
    }
    
    public function registerRecorder($recorder)
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
        $this->_record('assertTrue', $assertion);
    }
    
    public function assertFalse($value, $message = null)
    {
        $this->_record(
            'assertFalse', 
            new Domain51_Test_Assert_False($value, $message = null)
        );
    }
    
    public function assertNull($value, $message = null)
    {
        $this->_record('assertNull', new Domain51_Test_Assert_Null($value, $message));
    }
    
    public function assertType($type, $value, $message = null)
    {
        $this->_record('assertType', new Domain51_Test_Assert_Type($type, $value, $message));
    }
    
    public function assertEqual($one, $two, $message = null)
    {
        $this->_record('assertEqual', new Domain51_Test_Assert_Equal($one, $two, $message));
    }
    
    public function assertNotEqual($one, $two, $message = null)
    {
        $this->_record('assertNotEqual', new Domain51_Test_Assert_NotEqual($one, $two, $message));
    }
    
    public function assertIdentical($one, $two, $message = null)
    {
        $this->_record('assertIdentical', new Domain51_Test_Assert_Identical($one, $two, $message));
    }
    
    public function assertNotIdentical($one, $two, $message = null)
    {
        $this->_record('assertNotIdentical', new Domain51_Test_Assert_NotIdentical($one, $two, $message));
    }
    
    public function assertRegExp($pattern, $value, $message = null)
    {
        $this->_record('assertRegExp', new Domain51_Test_Assert_RegExp($pattern, $value, $message));
    }
    
    public function assertNotRegExp($pattern, $value, $message = null)
    {
        $this->_record('assertNotRegExp', new Domain51_Test_Assert_NotRegExp($pattern, $value, $message));
    }
    
    private function _record($name, Domain51_Test_Assertion $assertion)
    {
        $named_assertion = new Domain51_Test_NamedAssertion($name, $assertion);
        if ($named_assertion->getStatus()) {
            $this->_recorder->onSuccess($named_assertion);
        } else {
            $this->_recorder->onFailure($named_assertion);
        }
    }
}