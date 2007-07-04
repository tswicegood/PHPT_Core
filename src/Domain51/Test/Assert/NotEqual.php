<?php

require_once 'Domain51/Test/Assert/Equal.php';

class Domain51_Test_Assert_NotEqual extends Domain51_Test_Assert_Equal
{
    protected $_comparison = array(
        0 => 'are',
        1 => 'are not'
    );
    
    public function getStatus()
    {
        return !parent::getStatus();
    }
}