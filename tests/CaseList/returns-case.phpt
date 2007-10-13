--TEST--
The current() method returns the Case located in the current position of
the CaseList
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    dirname(__FILE__) . '/../../tests-supporting/tests/hello-world.phpt',
);

$list = new PHPT_CaseList($data);
$case = $list->current();

assert('$case instanceof PHPT_Case');
assert('$case->name == "Trivial \"Hello World\" test"');

assert('$case->output == ""');
$case->run();
assert('$case->output == "Hello World"');

?>
===DONE===
--EXPECT--
===DONE===