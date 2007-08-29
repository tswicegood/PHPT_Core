--TEST--
Domain51_Test_Assert_Type can determine if the value is a object
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new Domain51_Test_Assert_Type('object', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new Domain51_Test_Assert_Type('object', true);
$test = new Domain51_Test_Assert_Type('object', $assertion);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new Domain51_Test_Assert_Type('object', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
$test = new Domain51_Test_Assert_Type('object', array($reflection, 'implementsobjecterface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('object', $reflection);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of object
value [false] is not a type of object
value [array()] is not a type of object
value [array(0 => 123, 1 => 234)] is not a type of object
value ['hello world'] is not a type of object
value [123] is not a type of object
value [123.321] is not a type of object
value ['123'] is not a type of object
value ['123.321'] is not a type of object
value [object: Domain51_Test_Assert_Type] is a type of object
value [NULL] is not a type of object
value [resource] is not a type of object
value ['strtolower'] is not a type of object
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of object
value [array(0 => object: ReflectionClass, 1 => 'implementsobjecterface')] is not a type of object
value [object: ReflectionClass] is a type of object
===DONE===