--TEST--
Domain51_Test_Assert_Null verifies that the value passed in to it is null.  getStatus() returns
true if the assertion is valid, while getMessage() returns an appropriate message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/Null.php';

$valid = new Domain51_Test_Assert_Null(null);
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new Domain51_Test_Assert_Null('abc');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

?>
===DONE===
--EXPECT--
value [NULL] is null
value ['abc'] is not null
===DONE===