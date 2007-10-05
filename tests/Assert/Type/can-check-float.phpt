--TEST--
PHPT_Assert_Type can determine if the value is a float
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new PHPT_Assert_Type('float', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', 123.321);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new PHPT_Assert_Type('float', true);
$test = new PHPT_Assert_Type('float', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new PHPT_Assert_Type('float', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('PHPT_Assert_Type');
$test = new PHPT_Assert_Type('float', array($reflection, 'implementsfloaterface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('float', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of float
value [false] is not a type of float
value [array()] is not a type of float
value [array(0 => 123, 1 => 234)] is not a type of float
value ['hello world'] is not a type of float
value [123] is not a type of float
value [123.321] is a type of float
value ['123'] is not a type of float
value ['123.321'] is not a type of float
value [object: PHPT_Assert_Type] is not a type of float
value [NULL] is not a type of float
value [resource] is not a type of float
value ['strtolower'] is not a type of float
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of float
value [array(0 => object: ReflectionClass, 1 => 'implementsfloaterface')] is not a type of float
value [object: ReflectionClass] is not a type of float
===DONE===
