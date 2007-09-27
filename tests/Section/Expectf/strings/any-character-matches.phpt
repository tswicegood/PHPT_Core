--TEST--
Any character in the output causes a match
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->output = '!';

$section = new Domain51_Test_Section_Expectf('%s');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===