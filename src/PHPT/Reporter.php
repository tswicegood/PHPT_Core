<?php

interface PHPT_Reporter
{
    public function onStart();
    public function onEnd();
    
    public function onCaseStart(PHPT_Case $case);
    public function onCaseEnd(PHPT_Case $case);
    public function onCasePass(PHPT_Case $case);
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto);
    public function onCaseFail(PHPT_Case $case, Exception $exception);
}