--TEST--
onSuiteEnd() outputs a tally of all tests run
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$reporter = new PHPT_Reporter_Text();

// capture output of onCasePass()
ob_start();
$reporter->onCasePass($case);
ob_clean();

$reporter->onSuiteEnd(new PHPT_SimpleSuite());

?>
===DONE===
--EXPECTF--


Test Cases Run: 1, Passes: 1, Failures: 0, Errors: 0, Skipped: 0
Total Test Time: %d:%d
===DONE===
