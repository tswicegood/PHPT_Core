--TEST--
%f will match a basic float in decimal form
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = 'this string contains a float 0.123';

$section = new Domain51_Test_Section_Expectf('%f');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===