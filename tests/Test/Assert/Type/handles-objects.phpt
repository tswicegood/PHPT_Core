--TEST--
Test_Assert_Type can determine if the provide $value is NULL
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'object');
$assert = new Test_Assert_Type($obj, 'object');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'object');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [NULL] is not a [object]
value [true] is not a [object]
value [false] is not a [object]
value [array ( )] is not a [object]
value [array ( 0 => 123, 1 => 321, )] is not a [object]
value [array ( 123 => 321, )] is not a [object]
value ['some string'] is not a [object]
value ['123'] is not a [object]
value [123] is not a [object]
value [123.321] is not a [object]
value [object: Test_Assert_Type] is a [object]
value [resource] is not a [object]
==DONE==