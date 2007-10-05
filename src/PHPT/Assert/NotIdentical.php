<?php

class PHPT_Assert_NotIdentical extends PHPT_Assert_Identical
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
        return 'assertNotIdentical';
    }
}
