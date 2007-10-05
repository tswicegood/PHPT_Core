--TEST--
PHPT_Assert_Null verifies that the value passed in to it is null.  getStatus() returns
true if the assertion is valid, while getMessage() returns an appropriate message.
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_Null(null);
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new PHPT_Assert_Null('abc');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

?>
===DONE===
--EXPECT--
value [NULL] is null
value ['abc'] is not null
===DONE===
