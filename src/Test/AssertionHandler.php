<?php

require_once 'Test/Assert/True.php';
require_once 'Test/Reporter.php';
require_once 'Test/AssertionPack/Basic.php';

class Test_AssertionHandler
{
    private $_assertion_packs = array();
    private $_reporter = null;
    
    public function __construct(Test_Reporter $reporter = null)
    {
        $this->_reporter = $reporter;
    }
    
    public function __call($method, $arguments)
    {
        if (empty($this->_assertion_packs)) {
            $this->_initAssertionPacks();
        }
        
        foreach ($this->_assertion_packs as $pack) {
            if (!method_exists($pack, $method)) {
                continue;
            }
            
            call_user_func_array(
                array($pack, $method),
                $arguments
            );
            break;
        }
    }
    
    private function _initAssertionPacks()
    {
        $pack = new Test_AssertionPack_Basic();
        $pack->setReporter($this->_reporter);
        $this->_assertion_packs[] = $pack;
    }
}