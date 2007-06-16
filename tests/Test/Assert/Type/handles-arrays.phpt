--TEST--
Test_Assert_Type can determine if the provide $value is an array
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'array');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'array');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'array');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'array');
$assert = new Test_Assert_Type($obj, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'array');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);
?>
==DONE==
--EXPECT--
value [NULL] is not a [array]
value [true] is not a [array]
value [false] is not a [array]
value [array ( )] is a [array]
value [array ( 0 => 123, 1 => 321, )] is a [array]
value [array ( 123 => 321, )] is a [array]
value ['some string'] is not a [array]
value ['123'] is not a [array]
value [123] is not a [array]
value [123.321] is not a [array]
value [object: Test_Assert_Type] is not a [array]
value [resource] is not a [array]
==DONE==