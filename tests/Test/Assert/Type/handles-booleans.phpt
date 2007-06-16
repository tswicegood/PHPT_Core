--TEST--
Test_Assert_Type can determine if the provide $value is a boolean
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

$assert = new Test_Assert_Type(array(123, 321), 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'boolean');
$assert = new Test_Assert_Type($obj, 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'boolean');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [true] is a [boolean]
value [false] is a [boolean]
value [array ( )] is not a [boolean]
value [array ( 0 => 123, 1 => 321, )] is not a [boolean]
value [array ( 123 => 321, )] is not a [boolean]
value ['some string'] is not a [boolean]
value ['123'] is not a [boolean]
value [123] is not a [boolean]
value [123.321] is not a [boolean]
value [object: Test_Assert_Type] is not a [boolean]
value [resource] is not a [boolean]
==DONE==