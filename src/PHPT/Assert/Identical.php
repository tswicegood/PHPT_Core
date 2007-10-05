<?php

class PHPT_Assert_Identical extends PHPT_Assert_ComparisonAbstract
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
