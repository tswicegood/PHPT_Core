--TEST--
Domain51_Test_Assert_Type can determine if the value is a real
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new Domain51_Test_Assert_Type('real', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', 123.321);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new Domain51_Test_Assert_Type('real', true);
$test = new Domain51_Test_Assert_Type('real', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new Domain51_Test_Assert_Type('real', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('Domain51_Test_Assert_Type');
$test = new Domain51_Test_Assert_Type('real', array($reflection, 'implementsrealerface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new Domain51_Test_Assert_Type('real', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of real
value [false] is not a type of real
value [array()] is not a type of real
value [array(0 => 123, 1 => 234)] is not a type of real
value ['hello world'] is not a type of real
value [123] is not a type of real
value [123.321] is a type of real
value ['123'] is not a type of real
value ['123.321'] is not a type of real
value [object: Domain51_Test_Assert_Type] is not a type of real
value [NULL] is not a type of real
value [resource] is not a type of real
value ['strtolower'] is not a type of real
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of real
value [array(0 => object: ReflectionClass, 1 => 'implementsrealerface')] is not a type of real
value [object: ReflectionClass] is not a type of real
===DONE===