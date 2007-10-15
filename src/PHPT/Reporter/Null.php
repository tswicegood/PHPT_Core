<?php

class PHPT_Reporter_Null implements PHPT_Reporter
{
    public function __construct()
    {
        
    }
    
    public function onStart()
    {
        
    }
    
    public function onEnd()
    {
        
    }
    
    public function onCaseStart(PHPT_Case $case)
    {
        
    }
    
    public function onCaseEnd(PHPT_Case $case)
    {
        
    }
    
    public function onCasePass(PHPT_Case $case)
    {
        
    }
    
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure)
    {
        
    }
    
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
    {
        
    }
}