--TEST--
Domain51_Test_Assert_NotEqual tests two values to see if they are not equal (!=).  getStatus()
returns TRUE|FALSE depending on whether the assertion passes while getMessage() returns an
appropriate message depending on the status.
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$equal = new Domain51_Test_Assert_NotEqual(123, 321);
assert('$equal->getStatus()');
echo $equal->getMessage() . "\n";

$not_equal = new Domain51_Test_Assert_NotEqual(123, 123);
assert('!$not_equal->getStatus()');
echo $not_equal->getMessage() . "\n";

?>
===DONE===
--EXPECT--
values [123] and [321] are not equal
values [123] and [123] are equal
===DONE===