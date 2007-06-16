--TEST--
Test_Assert_Type can determine if the provide $value is a string
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'string');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'string');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'string');
$assert = new Test_Assert_Type($obj, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'string');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [NULL] is not a [string]
value [true] is not a [string]
value [false] is not a [string]
value [array ( )] is not a [string]
value [array ( 0 => 123, 1 => 321, )] is not a [string]
value [array ( 123 => 321, )] is not a [string]
value ['some string'] is a [string]
value ['123'] is a [string]
value [123] is not a [string]
value [123.321] is not a [string]
value [object: Test_Assert_Type] is not a [string]
value [resource] is not a [string]
==DONE==