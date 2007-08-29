--TEST--
Domain51_Test_Assert_Type implements Domain51_Test_Assertion
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
assert('$reflection->implementsInterface("Domain51_Test_Assertion")');

?>
===DONE===
--EXPECT--
===DONE===