<?php

class PHPT_Case_Validator_OutputBufferCompatible implements PHPT_Case_Validator
{
    public function __construct()
    {
        
    }
    
    public function validate(PHPT_Case $case)
    {
        if ($this->is($case)) {
            return null;
        }
        
        if ($case->sections->has('ARGS')) {
            throw new PHPT_Case_VetoException('unable to run in OutputBuffer mode with ARGS section present');
        }
        if ($case->sections->has('ENV')) {
            throw new PHPT_Case_VetoException('unable to run in OutputBuffer mode with ENV section present');
        }
        if ($case->sections->has('INI')) {
            throw new PHPT_Case_VetoException('unable to run in OutputBuffer mode with INI section present');
        }
    }
    
    public function is(PHPT_Case $case)
    {
        if ($case->sections->has('ARGS')) {
            return false;
        }
        if ($case->sections->has('INI')) {
            return false;
        }
        if ($case->sections->has('ENV')) {
            return false;
        }
        return true;
    }
}
