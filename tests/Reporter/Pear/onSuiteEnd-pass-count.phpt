--TEST--
onSuiteEnd() shows proper tally of # of tests that passed
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
$reporter->onCaseStart($case);
$reporter->onCasePass($case);
$reporter->onCaseEnd($case);
ob_clean();

$reporter->onSuiteEnd($suite);

?>
===DONE===
--EXPECTF--
TOTAL TIME 00:0%d
0 PASSED TESTS
0 SKIPPED TESTS
TOTAL TIME 00:0%d
1 PASSED TESTS
0 SKIPPED TESTS
===DONE===
