<?php

class PHPT_SimpleReporter implements PHPT_Reporter {
    public function onSuiteStart(PHPT_Suite $suite) {
        echo __METHOD__, " was called\n";
    }
    public function onCaseStart(PHPT_Case $case) {
        echo __METHOD__, " was called\n";
    }
    public function onCasePass(PHPT_Case $case) {
        echo __METHOD__, " was called\n";
    }
    public function onCaseEnd(PHPT_Case $case) {
        echo __METHOD__, " was called\n";
    }
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure) {
        echo __METHOD__, " was called\n";
    }
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto) {
        echo __METHOD__, " was called\n";
    }
    public function onSuiteEnd(PHPT_Suite $suite) {
        echo __METHOD__, " was called\n";
    }
    public function onParserError(Exception $exception) {
        echo __METHOD__, " was called\n";
    }
}
