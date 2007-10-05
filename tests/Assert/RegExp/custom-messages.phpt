--TEST--
An optional third parameter on PHPT_Assert_RegExp::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available:

 # The first "%s" is the pattern passed in at construct
 # The second is the value to search in
 # The third is "is" or "is not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_RegExp('/\d/', 123, 'value should match pattern');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new PHPT_Assert_RegExp('/\d/', 'abc', 'value should match pattern');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

$test = new PHPT_Assert_RegExp('/\d/', 123, 'pattern: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_RegExp('/\d/', 321, 'pattern: %s, value: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_RegExp('/\d/', 321, 'just value: %2$s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_RegExp('/\d/', 123, 'should be is: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_RegExp('/\d/', 'abc', 'should be is not: [%3$s]');
echo $test->getMessage() . "\n";
unset($test);

?>
===DONE===
--EXPECT--
value should match pattern
value should match pattern
pattern: '/\d/'
pattern: '/\d/', value: 321
just value: 321
should be is: [is]
should be is not: [is not]
===DONE===
