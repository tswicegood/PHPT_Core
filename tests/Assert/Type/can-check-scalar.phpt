--TEST--
PHPT_Assert_Type can determine if the value is a scalar
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new PHPT_Assert_Type('scalar', true);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', false);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', 'hello world');
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', 123);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', 123.321);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', '123');
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', '123.321');
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new PHPT_Assert_Type('scalar', true);
$test = new PHPT_Assert_Type('scalar', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new PHPT_Assert_Type('scalar', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', 'strtolower');
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('PHPT_Assert_Type');
$test = new PHPT_Assert_Type('scalar', array($reflection, 'implementsscalarerface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('scalar', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is a type of scalar
value [false] is a type of scalar
value [array()] is not a type of scalar
value [array(0 => 123, 1 => 234)] is not a type of scalar
value ['hello world'] is a type of scalar
value [123] is a type of scalar
value [123.321] is a type of scalar
value ['123'] is a type of scalar
value ['123.321'] is a type of scalar
value [object: PHPT_Assert_Type] is not a type of scalar
value [NULL] is not a type of scalar
value [resource] is not a type of scalar
value ['strtolower'] is a type of scalar
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of scalar
value [array(0 => object: ReflectionClass, 1 => 'implementsscalarerface')] is not a type of scalar
value [object: ReflectionClass] is not a type of scalar
===DONE===
