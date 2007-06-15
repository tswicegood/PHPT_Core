<?php

require_once 'Test/Reporter.php';

class Test_Reporter_Null implements Test_Reporter
{
    public function __construct()
    {
        
    }
    
    public function onSuccess(Test_Assertion $assertion) { }
    public function onFailure(Test_Assertion $assertion) { }
}