--TEST--
PHPT_Section_Expect does nothing in the provided Case's $output
property matches the data Expect was instantiated with.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = "foobar";

$expect = new PHPT_Section_Expect('foobar');
$expect->run($case);

?>
===DONE===
--EXPECT--
===DONE===
