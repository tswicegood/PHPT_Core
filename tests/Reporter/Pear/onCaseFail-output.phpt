--TEST--
onCaseSkip() outputs "FAIL %test name%[%test file%]"
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
$reporter->onCaseFail($case, new PHPT_SimpleFailureException('just to test failures'));

?>
===DONE===
--EXPECT--
FAIL some random test name[/path/to/some/test.phpt]
===DONE===
