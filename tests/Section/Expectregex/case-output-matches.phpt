--TEST--
Domain51_Test_Section_Expectregex does nothing when the provided Case's
$output property preg_match()s the $data the section was instantiated with
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$pattern = '/.{2}/';
$section = new Domain51_Test_Section_Expectregex($pattern);

$case = new Domain51_Test_SimpleTestCase();
$case->output = rand(10, 20);
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===