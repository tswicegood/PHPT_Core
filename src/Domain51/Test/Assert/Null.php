<?php

require_once 'Domain51/Test/Assert/SingleValueAbstract.php';

class Domain51_Test_Assert_Null extends Domain51_Test_Assert_SingleValueAbstract
{
    protected $_message = 'value [%s] %s null';
    
    public function getStatus()
    {
        return is_null($this->_value);
    }
    
    public function getName()
    {
        return 'assertNull';
    }
}