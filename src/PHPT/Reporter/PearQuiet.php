<?php

class PHPT_Reporter_PearQuiet extends PHPT_Reporter_Pear
{
    public function onCasePass(PHPT_Case $case)
    {
        $this->_pass_total++;
    }
    
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure)
    {
        $this->_failures[] = $case->filename;
        echo "FAIL {$case->name}[{$case->filename}]\n";
    }
    
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
    {
        $this->_skip_total++;
    }

}
