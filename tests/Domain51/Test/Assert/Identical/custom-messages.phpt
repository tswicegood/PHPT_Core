--TEST--
An optional third parameter on Domain51_Test_Assert_Identical::__construct() allows for a custom
message to be used instead of the default message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/Identical.php';

$valid = new Domain51_Test_Assert_Identical(123, 123, 'values should be identical');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new Domain51_Test_Assert_Identical(123, '123', 'values should be identical');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

?>
===DONE===
--EXPECT--
values should be identical
values should be identical
===DONE===