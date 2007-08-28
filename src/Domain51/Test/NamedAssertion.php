<?php

class Domain51_Test_NamedAssertion implements Domain51_Test_Assertion
{
    private $_name = '';
    private $_decorated_assertion = null;
    
    public function __construct($name, Domain51_Test_Assertion $assertion)
    {
        $this->_name = $name;
        $this->_decorated_assertion = $assertion;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getStatus()
    {
        return $this->_decorated_assertion->getStatus();
    }
    
    public function getMessage()
    {
        return $this->_decorated_assertion->getMessage();
    }
}