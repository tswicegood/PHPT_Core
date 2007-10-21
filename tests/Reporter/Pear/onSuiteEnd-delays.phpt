--TEST--
onSuiteEnd() shows the time it took to run the tests
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$suite = new PHPT_SimpleSuite();
$reporter = new PHPT_Reporter_Pear();

// trap onSuiteStart() output
ob_start();
$reporter->onSuiteStart($suite);
ob_clean();
$sleep = rand(1, 3);
sleep($sleep);

ob_start();
$reporter->onSuiteEnd($suite);
$buffer = ob_get_clean();

assert('strstr($buffer, "TOTAL TIME 00:0{$sleep}")');
echo $buffer;

?>
===DONE===
--EXPECTF--
TOTAL TIME 00:0%d
0 PASSED TESTS
0 SKIPPED TESTS
===DONE===
