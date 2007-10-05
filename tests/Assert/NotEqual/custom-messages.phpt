--TEST--
An optional third parameter on PHPT_Assert_NotEqual::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available: 
 # The first "%s" is the first value passed in at construct
 # The second is the second value
 # The third is "are" or "are not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$equal = new PHPT_Assert_NotEqual(123, 123, 'values should not be equal');
echo $equal->getMessage() . "\n";

$not_equal = new PHPT_Assert_NotEqual(123, 321, 'values should not be equal');
echo $not_equal->getMessage() . "\n";

$test = new PHPT_Assert_NotEqual(123, 123, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotEqual(123, 321, 'value one: %s, value two: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotEqual(123, 321, 'just value two: %2$s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotEqual(123, 321, 'should be are not: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotEqual(123, 123, 'should be are: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

?>
===DONE===
--EXPECT--
values should not be equal
values should not be equal
value one: 123
value one: 123, value two: 321
just value two: 321
should be are not: [are not]
should be are: [are]
===DONE===
