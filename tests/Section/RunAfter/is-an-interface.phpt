--TEST--
Domain51_Test_Section_RunAfter is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Section_RunAfter');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===