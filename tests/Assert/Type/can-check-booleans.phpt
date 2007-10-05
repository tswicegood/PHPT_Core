--TEST--
PHPT_Assert_Type can determine if the value is a bool
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new PHPT_Assert_Type('bool', true);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', false);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new PHPT_Assert_Type('bool', true);
$test = new PHPT_Assert_Type('bool', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new PHPT_Assert_Type('bool', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('PHPT_Assert_Type');
$test = new PHPT_Assert_Type('bool', array($reflection, 'implementsInterface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('bool', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is a type of bool
value [false] is a type of bool
value [array()] is not a type of bool
value [array(0 => 123, 1 => 234)] is not a type of bool
value ['hello world'] is not a type of bool
value [123] is not a type of bool
value [123.321] is not a type of bool
value ['123'] is not a type of bool
value ['123.321'] is not a type of bool
value [object: PHPT_Assert_Type] is not a type of bool
value [NULL] is not a type of bool
value [resource] is not a type of bool
value ['strtolower'] is not a type of bool
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of bool
value [array(0 => object: ReflectionClass, 1 => 'implementsInterface')] is not a type of bool
value [object: ReflectionClass] is not a type of bool
===DONE===
