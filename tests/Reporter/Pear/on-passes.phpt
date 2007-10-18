--TEST--
Basic output similar to PEAR_RunTest
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Pear();
$suite = new PHPT_SimpleSuite();
$suite->count = 2;

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

sleep(1);
$reporter->onSuiteEnd($suite);

?>
===DONE===
--EXPECT--
Running 2 tests
PASS foobar test[foobar.phpt]
PASS barfoo test[barfoo.phpt]
TOTAL TIME 00:01
2 PASSED TESTS
0 SKIPPED TESTS
===DONE===