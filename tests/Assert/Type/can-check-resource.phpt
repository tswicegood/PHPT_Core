--TEST--
Domain51_Test_Assert_Type can determine if the value is a resource
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new Domain51_Test_Assert_Type('resource', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new Domain51_Test_Assert_Type('resource', true);
$test = new Domain51_Test_Assert_Type('resource', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new Domain51_Test_Assert_Type('resource', $fp);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
$test = new Domain51_Test_Assert_Type('resource', array($reflection, 'implementsresourceerface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('resource', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of resource
value [false] is not a type of resource
value [array()] is not a type of resource
value [array(0 => 123, 1 => 234)] is not a type of resource
value ['hello world'] is not a type of resource
value [123] is not a type of resource
value [123.321] is not a type of resource
value ['123'] is not a type of resource
value ['123.321'] is not a type of resource
value [object: Domain51_Test_Assert_Type] is not a type of resource
value [NULL] is not a type of resource
value [resource] is a type of resource
value ['strtolower'] is not a type of resource
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of resource
value [array(0 => object: ReflectionClass, 1 => 'implementsresourceerface')] is not a type of resource
value [object: ReflectionClass] is not a type of resource
===DONE===