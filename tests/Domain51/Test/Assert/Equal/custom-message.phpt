--TEST--
An optional third parameter on Domain51_Test_Assert_Equal::__construct() allows for a custom
message to be used instead of the default message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/Equal.php';

$equal = new Domain51_Test_Assert_Equal(123, 123, 'values should be equal');
echo $equal->getMessage() . "\n";

$not_equal = new Domain51_Test_Assert_Equal(123, 321, 'values should be equal');
echo $not_equal->getMessage() . "\n";
?>
===DONE===
--EXPECT--
values should be equal
values should be equal
===DONE===