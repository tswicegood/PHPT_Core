--TEST--
Domain51_Test_Assert_Type can determine if the value is a array
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new Domain51_Test_Assert_Type('array', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', array());
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', array(123, 234));
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new Domain51_Test_Assert_Type('array', true);
$test = new Domain51_Test_Assert_Type('array', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new Domain51_Test_Assert_Type('array', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', array('ReflectionClass', 'export'));
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
$test = new Domain51_Test_Assert_Type('array', array($reflection, 'implementsInterface'));
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('array', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of array
value [false] is not a type of array
value [array()] is a type of array
value [array(0 => 123, 1 => 234)] is a type of array
value ['hello world'] is not a type of array
value [123] is not a type of array
value [123.321] is not a type of array
value ['123'] is not a type of array
value ['123.321'] is not a type of array
value [object: Domain51_Test_Assert_Type] is not a type of array
value [NULL] is not a type of array
value [resource] is not a type of array
value ['strtolower'] is not a type of array
value [array(0 => 'ReflectionClass', 1 => 'export')] is a type of array
value [array(0 => object: ReflectionClass, 1 => 'implementsInterface')] is a type of array
value [object: ReflectionClass] is not a type of array
===DONE===