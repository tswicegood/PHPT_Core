<?php

require_once 'Test/Case.php';
require_once 'Test/File.php';

class Test_Parser
{
    public function __construct()
    {
        
    }
    
    public function parse()
    {
        return new Test_Case();
    }
}