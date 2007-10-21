--TEST--
onSuiteEnd() shows proper tally of # of tests that failed
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$suite = new PHPT_SimpleSuite();
$reporter = new PHPT_Reporter_Pear();

// trap onSuiteStart() output
ob_start();
$reporter->onSuiteStart($suite);
ob_clean();

$reporter->onSuiteEnd($suite);

ob_start();
$case = new PHPT_SimpleTestCase();
$case->filename = "/path/to/foobar.phpt";
$reporter->onCaseStart($case);
$reporter->onCaseFail($case, new PHPT_SimpleFailureException());
$reporter->onCaseEnd($case);
ob_clean();

$reporter->onSuiteEnd($suite);

?>
===DONE===
--CLEAN--
<?php @unlink('run-tests.log'); ?>
--EXPECTF--
TOTAL TIME 00:0%d
0 PASSED TESTS
0 SKIPPED TESTS
wrote log to "%srun-tests.log"
TOTAL TIME 00:0%d
0 PASSED TESTS
0 SKIPPED TESTS
1 FAILED TESTS:
/path/to/foobar.phpt
===DONE===
