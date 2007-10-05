<?php

class PHPT_Case_Validator_Runnable implements PHPT_Case_Validator
{
    private $_message = false;
    
    public function __construct()
    {
        
    }
    
    public function validate(PHPT_Case $case)
    {
        if (!$this->is($case)) {
            throw new PHPT_Case_InvalidCaseException($this->_message);
        }
    }
    
    public function is(PHPT_Case $case)
    {
        if ($case->sections->has('FILE') == false) {
            $this->_message = 'missing FILE section';
        } elseif ($case->sections->has('TEST') == false) {
            $this->_message = 'missing TEST section';
        } elseif ($case->sections->FILE->filename == '') {
            $this->_message = 'FILE section missing filename property';
        }
        
        return !(bool)$this->_message;

    }
}
