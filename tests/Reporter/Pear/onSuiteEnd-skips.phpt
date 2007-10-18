--TEST--
onSuiteEnd() shows the number of skipped tests
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Pear();
$suite = new PHPT_SimpleSuite();

// capture onSuiteStart and the onCase* methods
ob_start();
$reporter->onSuiteStart($suite);

$case = new PHPT_SimpleTestCase();

$reporter->onCaseStart($case);
$reporter->onCaseSkip($case, new PHPT_Case_VetoException('no good reason'));
$reporter->onCaseEnd($case);
ob_clean();

$reporter->onSuiteEnd($suite);


?>
===DONE===
--EXPECTF--
TOTAL TIME 00:0%d
0 PASSED TESTS
1 SKIPPED TESTS
===DONE===