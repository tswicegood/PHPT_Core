--TEST--
Test_Assert_Type can determine if the provide $value is NULL
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'null');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'null');
$assert = new Test_Assert_Type($obj, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'null');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [NULL] is a [null]
value [true] is not a [null]
value [false] is not a [null]
value [array ( )] is not a [null]
value [array ( 0 => 123, 1 => 321, )] is not a [null]
value [array ( 123 => 321, )] is not a [null]
value ['some string'] is not a [null]
value ['123'] is not a [null]
value [123] is not a [null]
value [123.321] is not a [null]
value [object: Test_Assert_Type] is not a [null]
value [resource] is not a [null]
==DONE==