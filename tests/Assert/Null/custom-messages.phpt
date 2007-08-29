--TEST--
An optional second parameter of Domain51_Test_Assert_Null::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are two replacements available: 
 # The first "%s" is the first value passed in at construct
 # The second is "is" or "is not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new Domain51_Test_Assert_Null(null, 'value should be null');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new Domain51_Test_Assert_Null(123, 'value should be null');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

$test = new Domain51_Test_Assert_Null(null, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Null(null, 'should be is: [%2$s]');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Null(123, 'should be is not: [%2$s]');
echo $test->getMessage() . "\n";
unset($test);

?>
===DONE===
--EXPECT--
value should be null
value should be null
value one: NULL
should be is: [is]
should be is not: [is not]
===DONE===