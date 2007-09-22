--TEST--
The Domain51_Test_Section_EnvModifier is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Section_EnvModifier');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===