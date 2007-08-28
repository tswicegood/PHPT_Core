<?php

require_once 'Domain51/Test/Assert/RegExp.php';

class Domain51_Test_Assert_NotRegExp extends Domain51_Test_Assert_RegExp
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