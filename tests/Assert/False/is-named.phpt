--TEST--
False assertion is named assertFalse
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_False(false);
assert('$assertion->getName() == "assertFalse"');

?>
===DONE===
--EXPECT--
===DONE===
