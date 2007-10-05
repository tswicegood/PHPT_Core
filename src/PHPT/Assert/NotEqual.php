<?php

class PHPT_Assert_NotEqual extends PHPT_Assert_Equal
{
    protected $_comparison = array(
        0 => 'are',
        1 => 'are not'
    );
    
    public function getStatus()
    {
        return !parent::getStatus();
    }
    
    public function getName()
    {
        return 'assertNotEqual';
    }
}
