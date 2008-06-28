<?php

class PHPT_SimpleReporter implements PHPT_Reporter {
    public function onSuiteStart(PHPT_Suite $suite) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onCaseStart(PHPT_Case $case) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onCasePass(PHPT_Case $case) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onCaseEnd(PHPT_Case $case) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onCaseFail(PHPT_Case $case, PHPT_Case_FailureException $failure) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onSuiteEnd(PHPT_Suite $suite) {
        echo __METHOD__, " was called", PHP_EOL;
    }
    public function onParserError(Exception $exception) {
        echo __METHOD__, " was called", PHP_EOL;
    }
}
