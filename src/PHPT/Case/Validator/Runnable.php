<?php

class PHPT_Case_Validator_Runnable implements PHPT_Case_Validator
{
    public function __construct()
    {
        
    }
    
    public function validate(PHPT_Case $case)
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
            throw new PHPT_Exception_InvalidCaseException($message);
        }
    }
}
