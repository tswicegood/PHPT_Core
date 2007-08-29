--TEST--
False assertion is named assertFalse
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_False(false);
assert('$assertion->getName() == "assertFalse"');

?>
===DONE===
--EXPECT--
===DONE===