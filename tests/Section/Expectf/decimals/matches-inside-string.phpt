--TEST--
A match is found if "%d" within a string can be replaced with a decimal
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = 'this string contains 1 decimal';

$section = new Domain51_Test_Section_Expectf('this string contains %d decimal');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===