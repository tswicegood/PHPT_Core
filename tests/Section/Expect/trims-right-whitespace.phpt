--TEST--
Any trailing whitespace from the Case->output is trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "foobar\n";

$expect = new PHPT_Section_Expect('foobar');
$expect->run($case);

?>
===DONE===
--EXPECT--
===DONE===