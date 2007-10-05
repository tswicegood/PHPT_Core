--TEST--
An optional second parameter on PHPT_Assert_True::__construct() allows for a custom
message to be used instead of the default message.  Any valid <i>$format</i> string is allowed.
There are three replacements available: 
 # The first "%s" is the first value passed in at construct
 # The third is "is" or "is not" depending on whether getStatus() is true or false, respectively
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$valid = new PHPT_Assert_True(true, 'value should be true');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid  = new PHPT_Assert_True(false, 'value should be true');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";

$test = new PHPT_Assert_True(0, 'value one: %s');
echo $test->getMessage() . "\n";
unset($test);

$test = new PHPT_Assert_True(false, 'should be is not: [%2$s]');
echo $test->getMessage() . "\n";
unset($test);


?>
===DONE===
--EXPECT--
value should be true
value should be true
value one: 0
should be is not: [is not]
===DONE===
