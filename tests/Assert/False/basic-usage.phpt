--TEST--
PHPT_Assert_False verifies that a value is equal (==) to false.  getStatus() returns true
if the assertion is valid, while getMessage() returns an appropriate message.
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_False(false);
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new PHPT_Assert_False(true);
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

$non_zero = new PHPT_Assert_False(-1);
assert('!$non_zero->getStatus()');
echo $non_zero->getMessage() . "\n";

$zero = new PHPT_Assert_False(0);
assert('$zero->getStatus()');
echo $zero->getMessage() . "\n";

?>
===DONE===
--EXPECT--
value [false] is false
value [true] is not false
value [-1] is not false
value [0] is false
===DONE===
