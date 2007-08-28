--TEST--
Null assertion is named assertNull
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_Null(null);
assert('$assertion->getName() == "assertNull"');

?>
===DONE===
--EXPECT--
===DONE===