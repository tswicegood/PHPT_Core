<?php

class PHPT_Assert_Equal extends PHPT_Assert_ComparisonAbstract
{
    protected $_message = 'values [%s] and [%s] %s equal';
    
    public function getStatus()
    {
        return $this->_one == $this->_two;
    }
    
    public function getName()
    {
        return 'assertEqual';
    }
}
