--TEST--
Any character in the output causes a match
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';
require_once dirname(__FILE__) . '/../../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = '!';

$section = new PHPT_Section_EXPECTF('%s');
$section->run($case);

?>
===DONE===
--EXPECT--
===DONE===
