--TEST--
The current() method returns the Case located in the current position of
the Suite
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    dirname(__FILE__) . '/../../tests-supporting/tests/hello-world.phpt',
);

$list = new PHPT_Suite($data);
$case = $list->current();

assert('$case instanceof PHPT_Case');
assert('$case->name == "Trivial \"Hello World\" test"');

assert('$case->output == ""');
$case->run(new PHPT_Reporter_Null());
assert('$case->output == "Hello World"');

?>
===DONE===
--EXPECT--
===DONE===
