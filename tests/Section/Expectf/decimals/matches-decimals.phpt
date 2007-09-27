--TEST--
A match is found if "%d" can be replaced with a decimal
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = '1';

$section = new Domain51_Test_Section_Expectf('%d');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===