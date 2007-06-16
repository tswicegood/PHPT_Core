--TEST--
Test_Assert_Type can determine if the provide $value is a particular object.  An instanceof
comparison is done on all types that are not specifically known.
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'Test_Assert_Type');
$assert = new Test_Assert_Type($obj, 'Test_Assert_Type');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new ReflectionClass('Test_Assert_Type');
$assert = new Test_Assert_Type($obj, 'ReflectionClass');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'Test_Assert_Type');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [NULL] is not a [Test_Assert_Type]
value [true] is not a [Test_Assert_Type]
value [false] is not a [Test_Assert_Type]
value [array ( )] is not a [Test_Assert_Type]
value [array ( 0 => 123, 1 => 321, )] is not a [Test_Assert_Type]
value [array ( 123 => 321, )] is not a [Test_Assert_Type]
value ['some string'] is not a [Test_Assert_Type]
value ['123'] is not a [Test_Assert_Type]
value [123] is not a [Test_Assert_Type]
value [123.321] is not a [Test_Assert_Type]
value [object: Test_Assert_Type] is a [Test_Assert_Type]
value [object: ReflectionClass] is a [ReflectionClass]
value [resource] is not a [Test_Assert_Type]
==DONE==