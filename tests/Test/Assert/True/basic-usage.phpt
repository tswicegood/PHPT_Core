--TEST--
Test_Assert_True handles determining that the value it is instantied with is true and has
a message on success or failure
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/True.php';

$assert = new Test_Assert_True(true);
assert('$assert->getStatus() == true');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(false);
assert('$assert->getStatus() == false');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True('string');
assert('$assert->getStatus() == true');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(array());
assert('$assert->getStatus() == false');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(1);
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(-1);
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(0);
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(array(1));
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

// always returns custom message whether true or false
$assert = new Test_Assert_True(true, 'my message');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_True(false, 'my message');
echo $assert->getMessage() . "\n";

// inserts value at %s in custom messages
$assert = new Test_Assert_True(true, 'this custom message inserts the value: %s');
echo $assert->getMessage() . "\n";

echo 'complete';

?>
--EXPECT--
value [true] is true
value [false] is not true
value ['string'] is true
value [array ()] is not true
value [1] is true
value [-1] is true
value [0] is not true
value [array (
  0 => 1,
)] is true
my message
my message
this custom message inserts the value: true
complete