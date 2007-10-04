<?php

class Domain51_Test_Assert_True extends Domain51_Test_Assert_SingleValueAbstract
{
    protected $_message = 'value [%s] %s true';
    protected $_value = null;
    
    public function getStatus()
    {
        return $this->_value == true;
    }
    
    public function getName()
    {
        return 'assertTrue';
    }
}