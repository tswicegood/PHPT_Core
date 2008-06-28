--TEST--
Any trailing whitespace from the Case->output is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "foobar" . PHP_EOL;

$expect = new PHPT_Section_EXPECT('foobar');
$expect->run($case);

?>
===DONE===
--EXPECT--
===DONE===
