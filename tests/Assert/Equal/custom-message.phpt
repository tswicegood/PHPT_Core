--TEST--
An optional third parameter on Domain51_Test_Assert_Equal::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available: 
 # The first "%s" is the first value passed in at construct
 # The second is the second value
 # The third is "are" or "are not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$equal = new Domain51_Test_Assert_Equal(123, 123, 'values should be equal');
echo $equal->getMessage() . "\n";

$not_equal = new Domain51_Test_Assert_Equal(123, 321, 'values should be equal');
echo $not_equal->getMessage() . "\n";

$test = new Domain51_Test_Assert_Equal(123, 123, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Equal(123, 321, 'value one: %s, value two: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Equal(123, 321, 'just value two: %2$s');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Equal(123, 123, 'should be are: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

$test = new Domain51_Test_Assert_Equal(123, 321, 'should be are not: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

?>
===DONE===
--EXPECT--
values should be equal
values should be equal
value one: 123
value one: 123, value two: 321
just value two: 321
should be are: [are]
should be are not: [are not]
===DONE===