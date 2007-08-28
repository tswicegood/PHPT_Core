<?php

require_once 'Domain51/Test/Assert/ComparisonAbstract.php';

class Domain51_Test_Assert_Identical extends Domain51_Test_Assert_ComparisonAbstract
{
    protected $_message = 'values [%s] and [%s] %s identical';
    
    public function getStatus()
    {
        return $this->_one === $this->_two;
    }
    
    public function getName()
    {
        return 'assertIdentical';
    }
}