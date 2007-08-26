<?php

class Domain51_Test_AssertionHandler
{
    private $_recorder = null;
    private $_assertion_map = array();
    private $_assertion_packs = array();
    public $name = '';
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function addAssertionPack($pack)
    {
        $declared = $pack->declared();
        $pack_name = get_class($pack);
        $this->_assertion_packs[$pack_name] = $pack;
        $this->_assertion_packs[$pack_name]->registerRecorder($this->_recorder);
        foreach ($declared as $assertion) {
            $this->_assertion_map[$assertion] = $pack_name;
        }
    }
    
    public function registerRecorder(Domain51_Test_ResultRecorder $recorder)
    {
        $this->_recorder = $recorder;
        $this->_recorder->registerAssertionHandler($this);
    }
    
    public function __call($method, $arguments)
    {
        return call_user_func_array(
            array($this->_assertion_packs[$this->_assertion_map[$method]], $method),
            $arguments
        );
    }
}