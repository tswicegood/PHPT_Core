--TEST--
onEnd() outputs a tally of all tests run
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$reporter = new PHPT_Reporter_Text();

// capture output of onCasePass()
ob_start();
$reporter->onCasePass($case);
ob_clean();

$reporter->onEnd();

?>
===DONE===
--EXPECT--


Test Cases Run: 1, Passes: 1, Failures: 0, Skipped: 0
===DONE===
