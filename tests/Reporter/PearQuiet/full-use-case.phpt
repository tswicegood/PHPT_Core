--TEST--
Walk through the full use-case
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_reporter-mocks.inc';

$reporter = new PHPT_Reporter_PearQuiet();
$suite = new PHPT_SimpleSuite();
$suite->count = 4;
$reporter->onSuiteStart($suite);

$case = new PHPT_SimpleTestCase();
$case->name = "foobar test";
$case->filename = "foobar.phpt";
$reporter->onCaseStart($case);
$reporter->onCasePass($case);
$reporter->onCaseEnd($case);

$case = new PHPT_SimpleTestCase();
$case->name = "barfoo test";
$case->filename = "barfoo.phpt";
$reporter->onCaseStart($case);
$reporter->onCasePass($case);
$reporter->onCaseEnd($case);



$case = new PHPT_SimpleTestCase();
$case->name = 'failed test';
$case->filename = 'failed-test.phpt';
$failure = new PHPT_SimpleFailureException('test failure message');

$reporter->onCaseStart($case);
$reporter->onCaseFail($case, $failure);
$reporter->onCaseEnd($case);

$case = new PHPT_SimpleTestCase();
$case->name = 'skipped test';
$case->filename = 'skipped-test.phpt';

$veto = new PHPT_Case_VetoException('simple skip message');
$reporter->onCaseStart($case);
$reporter->onCaseSkip($case, $veto);
$reporter->onCaseEnd($case);


$reporter->onSuiteEnd($suite);

?>
===DONE===
--CLEAN--
<?php @unlink('run-tests.log'); ?>
--EXPECTF--
Running 4 tests
FAIL failed test[failed-test.phpt]
wrote log to "%srun-tests.log"
TOTAL TIME 00:0%d
2 PASSED TESTS
1 SKIPPED TESTS
1 FAILED TESTS:
failed-test.phpt
===DONE===
