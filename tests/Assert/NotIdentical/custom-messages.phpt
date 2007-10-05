--TEST--
An optional third parameter on PHPT_Assert_NotIdentical::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available: 
 # The first "%s" is the first value passed in at construct
 # The second is the second value
 # The third is "are" or "are not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_NotIdentical(123, '123', 'values should not be identical');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new PHPT_Assert_NotIdentical(123, 123, 'values should not be identical');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

$test = new PHPT_Assert_NotIdentical(123, 123, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotIdentical(123, 321, 'value one: %s, value two: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotIdentical(123, 321, 'just value two: %2$s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotIdentical(123, 123, 'should be are: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_NotIdentical(123, '123', 'should be are not: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

?>
===DONE===
--EXPECT--
values should not be identical
values should not be identical
value one: 123
value one: 123, value two: 321
just value two: 321
should be are: [are]
should be are not: [are not]
===DONE===
