--TEST--
Domain51_Test_Assert_Equal tests two values to see if they are equal (==).  getStatus() returns
TRUE|FALSE depending on whether the assertion passes while getMessage() returns an appropriate
message depending on the status.
--FILE--
<?php
require dirname(__FILE__) . '/../_setup.inc';
require_once 'Domain51/Test/Assert/Equal.php';

$equal = new Domain51_Test_Assert_Equal(123, 123);
assert('$equal->getStatus()');
echo $equal->getMessage() . "\n";

$not_equal = new Domain51_Test_Assert_Equal(123, 321);
assert('!$not_equal->getStatus()');
echo $not_equal->getMessage() . "\n";

?>
===DONE===
--EXPECT--
values [123] and [123] are equal
values [123] and [321] are not equal
===DONE===