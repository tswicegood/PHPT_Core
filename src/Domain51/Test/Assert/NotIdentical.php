<?php

require_once 'Domain51/Test/Assert/Identical.php';

class Domain51_Test_Assert_NotIdentical extends Domain51_Test_Assert_Identical
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