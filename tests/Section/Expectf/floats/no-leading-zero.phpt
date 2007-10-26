--TEST--
Will catch a float without a leading digit
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '.123';

$section = new PHPT_Section_EXPECTF('%f');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
