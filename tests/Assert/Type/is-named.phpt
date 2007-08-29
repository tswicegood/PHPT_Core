--TEST--
Type assertion is named assertType
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_Type('bool', true);
assert('$assertion->getName() == "assertType"');

?>
===DONE===
--EXPECT--
===DONE===