--TEST--
Test_Assert_Type can determine if the provide $value is a numeric
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Assert/Type.php';

$assert = new Test_Assert_Type(null, 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(true, 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(false, 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(), 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123, 321), 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(array(123 => 321), 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('some string', 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type('123', 'numeric');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123, 'numeric');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$assert = new Test_Assert_Type(123.321, 'numeric');
assert('$assert->getStatus()');
echo $assert->getMessage() . "\n";

$obj = new Test_Assert_Type(true, 'numeric');
$assert = new Test_Assert_Type($obj, 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";

$filename = tempnam(sys_get_temp_dir(), '');
$resource = fopen($filename, 'w');
assert('is_resource($resource)');
$assert = new Test_Assert_Type($resource, 'numeric');
assert('!$assert->getStatus()');
echo $assert->getMessage() . "\n";
fclose($resource);
unlink($filename);

?>
==DONE==
--EXPECT--
value [NULL] is not a [numeric]
value [true] is not a [numeric]
value [false] is not a [numeric]
value [array ( )] is not a [numeric]
value [array ( 0 => 123, 1 => 321, )] is not a [numeric]
value [array ( 123 => 321, )] is not a [numeric]
value ['some string'] is not a [numeric]
value ['123'] is a [numeric]
value [123] is a [numeric]
value [123.321] is a [numeric]
value [object: Test_Assert_Type] is not a [numeric]
value [resource] is not a [numeric]
==DONE==