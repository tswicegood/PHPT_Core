<?php

class PHPT_Case_Validator_CgiRequired implements PHPT_Case_Validator
{
    public function __construct()
    {
        
    }
    
    public function validate(PHPT_Case $case)
    {
        if ($this->is($case) == false) {
            throw new PHPT_Case_InvalidCaseException();
        }
    }
    
    public function is(PHPT_Case $case)
    {
        $return = $case->sections->filterByInterface('CgiExecutable')->valid();
        $case->sections->filterByInterface();
        return $return;
    }
}