--TEST--
Test_Assert_False handles determining that the value it is instantied with is false and has
a message on success or failure
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/False.php';

$assert = new Test_Assert_False(false);
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(true);
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False('string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False('');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(array());
assert('$assert->getStatus() == true');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(1);
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(-1);
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(0);
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(array(1));
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

// always returns custom message whether true or false
$assert = new Test_Assert_False(false, 'my message');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_False(true, 'my message');
echo $assert->getMessage() . "\n";

// inserts value at %s in custom messages
$assert = new Test_Assert_False(false, 'this custom message inserts the value: %s');
echo $assert->getMessage() . "\n";

?>
==DONE==
--EXPECT--
value [false] is false
value [true] is not false
value ['string'] is not false
value [''] is false
value [array ()] is false
value [1] is not false
value [-1] is not false
value [0] is false
value [array (
  0 => 1,
)] is not false
my message
my message
this custom message inserts the value: false
==DONE==