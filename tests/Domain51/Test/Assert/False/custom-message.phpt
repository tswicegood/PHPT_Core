--TEST--
An optional second parameter on Domain51_Test_Assert_False::__construct() allows for a custom
message to be used instead of the default message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/False.php';

$valid = new Domain51_Test_Assert_False(false, 'value should be false');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new Domain51_Test_Assert_False(true, 'value should be false');
assert('!$not_valid->getStatus()');

echo $not_valid->getMessage() . "\n";
?>
===DONE===
--EXPECT--
value should be false
value should be false
===DONE===