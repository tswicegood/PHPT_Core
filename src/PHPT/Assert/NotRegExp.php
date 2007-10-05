<?php

class PHPT_Assert_NotRegExp extends PHPT_Assert_RegExp
{
    protected $_comparison = array(
        0 => 'is',
        1 => 'is not',
    );
    
    public function getStatus()
    {
        return !parent::getStatus();
    }
    
    public function getName()
    {
        return 'assertNotRegExp';
    }
}
