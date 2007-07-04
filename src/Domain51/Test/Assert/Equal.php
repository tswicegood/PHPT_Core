<?php

require_once 'Domain51/Test/Assert/ComparisonAbstract.php';

class Domain51_Test_Assert_Equal extends Domain51_Test_Assert_ComparisonAbstract
{
    protected $_message = 'values [%s] and [%s] %s equal';
    
    public function getStatus()
    {
        return $this->_one == $this->_two;
    }
}