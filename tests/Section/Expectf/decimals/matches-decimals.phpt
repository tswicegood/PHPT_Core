--TEST--
A match is found if "%d" can be replaced with a decimal
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '1';

$section = new PHPT_Section_EXPECTF('%d');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
