--TEST--
Test_Assertion is the interface that all assertions must implement
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Assertion');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===