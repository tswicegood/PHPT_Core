<?php

class Domain51_Test_CodeRunner
{
    public function __construct()
    {
        
    }
    
    public function run($filename)
    {
        ob_start();
        include $filename;
        $buffer = ob_get_clean();
        
        $result = new Domain51_Test_CodeRunner_Result();
        $result->filename = $filename;
        $result->output = $buffer;
        return $result;
    }
}