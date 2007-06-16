--TEST--
Test_Assert_Type is true if the $value is of a given $type
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(true, 'boolean');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'boolean');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'array');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'integer');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'int');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'int');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'numeric');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'numeric');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('string', 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";


?>
==DONE==
--EXPECT--
value [true] is a [boolean]
value [false] is a [boolean]
value [array ( )] is not a [boolean]
value [array ( 0 => 123, 1 => 321, )] is a [array]
value [123] is not a [array]
value [123] is a [integer]
value [123] is a [int]
value ['123'] is not a [int]
value ['123'] is a [numeric]
value [123.321] is a [numeric]
value ['string'] is not a [numeric]
==DONE==