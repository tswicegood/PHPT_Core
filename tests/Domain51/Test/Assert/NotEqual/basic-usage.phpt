--TEST--
Domain51_Test_Assert_NotEqual tests two values to see if they are not equal (!=).  getStatus()
returns TRUE|FALSE depending on whether the assertion passes while getMessage() returns an
appropriate message depending on the status.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/NotEqual.php';

$equal = new Domain51_Test_Assert_NotEqual(123, 321);
assert('$equal->getStatus()');
echo $equal->getMessage() . "\n";

$not_equal = new Domain51_Test_Assert_NotEqual(123, 123);
assert('!$not_equal->getStatus()');
echo $not_equal->getMessage() . "\n";

?>
===DONE===
--EXPECT--
value [123] is not equal to [321]
value [123] is equal to [123]
===DONE===