--TEST--
Domain51_Test_Assert_Type can determine if the value is a ReflectionClass
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new Domain51_Test_Assert_Type('ReflectionClass', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new Domain51_Test_Assert_Type('ReflectionClass', true);
$test = new Domain51_Test_Assert_Type('ReflectionClass', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new Domain51_Test_Assert_Type('ReflectionClass', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
$test = new Domain51_Test_Assert_Type('ReflectionClass', array($reflection, 'implementsReflectionClasserface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('ReflectionClass', $reflection);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of ReflectionClass
value [false] is not a type of ReflectionClass
value [array()] is not a type of ReflectionClass
value [array(0 => 123, 1 => 234)] is not a type of ReflectionClass
value ['hello world'] is not a type of ReflectionClass
value [123] is not a type of ReflectionClass
value [123.321] is not a type of ReflectionClass
value ['123'] is not a type of ReflectionClass
value ['123.321'] is not a type of ReflectionClass
value [object: Domain51_Test_Assert_Type] is not a type of ReflectionClass
value [NULL] is not a type of ReflectionClass
value [resource] is not a type of ReflectionClass
value ['strtolower'] is not a type of ReflectionClass
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of ReflectionClass
value [array(0 => object: ReflectionClass, 1 => 'implementsReflectionClasserface')] is not a type of ReflectionClass
value [object: ReflectionClass] is a type of ReflectionClass
===DONE===