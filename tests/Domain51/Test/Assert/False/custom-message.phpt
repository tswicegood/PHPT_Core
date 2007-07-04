--TEST--
An optional second parameter on Domain51_Test_Assert_False::__construct() allows for a custom
message to be used instead of the default message.

An optional second parameter on Domain51_Test_Assert_False::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available: 
 # The first "%s" is the first value passed in at construct
 # The third is "is" or "is not" depending on whether getStatus() is true or false, respectively

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

$test = new Domain51_Test_Assert_False(0, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_False(true, 'should be is not: [%2$s]');
echo $test->getMessage() . "\n";
unset($test);


?>
===DONE===
--EXPECT--
value should be false
value should be false
value one: 0
should be is not: [is not]
===DONE===