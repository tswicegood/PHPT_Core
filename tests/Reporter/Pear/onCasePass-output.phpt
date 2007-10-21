--TEST--
onCasePass() outputs "PASS %test name%[%test file%]"
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
$reporter->onCasePass($case);

?>
===DONE===
--EXPECT--
PASS some random test name[/path/to/some/test.phpt]
===DONE===
