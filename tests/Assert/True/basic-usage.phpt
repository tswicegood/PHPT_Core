--TEST--
Domain51_Test_Assert_True tests whether a value is true (== true).
getStatus() returns true if it is, false otherwise while getMessage()
returns an appropriate message
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new Domain51_Test_Assert_True(true);
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new Domain51_Test_Assert_True(false);
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

?>
===DONE===
--EXPECT--
value [true] is true
value [false] is not true
===DONE===