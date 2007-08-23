<?php

require_once 'Domain51/Test/Assert/SingleValueAbstract.php';

class Domain51_Test_Assert_False extends Domain51_Test_Assert_SingleValueAbstract
{
    protected $_value = null;
    protected $_message = 'value [%s] %s false';
    
    public function getStatus()
    {
        return $this->_value == false;
    }
}