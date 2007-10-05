--TEST--
Domain51_Test_Assertion requires a getMessage() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_Assertion');
assert('$reflection->hasMethod("getMessage")');

?>
===DONE===
--EXPECT--
===DONE===