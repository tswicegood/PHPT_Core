--TEST--
Domain51_Test_Assert_NotIdentical verifies that the two values it is passed are not identical (!==).
getStatus() returns true if the assertion is valid, while getMessage() returns an appropriate
message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/NotIdentical.php';

$valid = new Domain51_Test_Assert_NotIdentical(123, '123');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new Domain51_Test_Assert_NotIdentical(123, 123);
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

?>
===DONE===
--EXPECT--
values [123] and ['123'] are not identical
values [123] and [123] are identical
===DONE===