--TEST--
The PHPT_Section_ENVModifier is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_ENVModifier');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===
