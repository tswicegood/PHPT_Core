--TEST--
Identical assertion is named assertIdentical
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new PHPT_Assert_Identical(123, 123);
assert('$assertion->getName() == "assertIdentical"');

?>
===DONE===
--EXPECT--
===DONE===
