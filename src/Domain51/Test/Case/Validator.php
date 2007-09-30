<?php

class Domain51_Test_Case_Validator
{
    public function __construct()
    {
        
    }
    
    public function validate($case)
    {
        $message = false;
        if ($case->sections->has('FILE') == false) {
            $message = 'missing FILE section';
        } elseif ($case->sections->has('TEST') == false) {
            $message = 'missing TEST section';
        } elseif ($case->sections->FILE->filename == '') {
            $message = 'FILE section missing filename property';
        }
        
        if ($message !== false) {
            throw new Domain51_Test_Exception_InvalidCaseException($message);
        }
    }
}