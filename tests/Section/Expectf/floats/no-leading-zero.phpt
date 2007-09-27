--TEST--
Will catch a float without a leading digit
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = '.123';

$section = new Domain51_Test_Section_Expectf('%f');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===