--TEST--
onCaseSkip() outputs "SKIP %test name%[%test file%](reason: %skip reason%)"
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Pear();

$case = new PHPT_SimpleTestCase();
$case->name = "some random test name";
$case->filename = "/path/to/some/test.phpt";
ob_start();
$reporter->onCaseStart($case);
ob_clean();
$reporter->onCaseSkip($case, new PHPT_Case_VetoException('just to test'));

?>
===DONE===
--EXPECT--
SKIP some random test name[/path/to/some/test.phpt](reason: just to test)
===DONE===