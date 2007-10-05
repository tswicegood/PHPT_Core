--TEST--
PHPT_Assert_Type can determine if the value is a double
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new PHPT_Assert_Type('double', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', 123.321);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new PHPT_Assert_Type('double', true);
$test = new PHPT_Assert_Type('double', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', null);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new PHPT_Assert_Type('double', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('PHPT_Assert_Type');
$test = new PHPT_Assert_Type('double', array($reflection, 'implementsdoubleerface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('double', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of double
value [false] is not a type of double
value [array()] is not a type of double
value [array(0 => 123, 1 => 234)] is not a type of double
value ['hello world'] is not a type of double
value [123] is not a type of double
value [123.321] is a type of double
value ['123'] is not a type of double
value ['123.321'] is not a type of double
value [object: PHPT_Assert_Type] is not a type of double
value [NULL] is not a type of double
value [resource] is not a type of double
value ['strtolower'] is not a type of double
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of double
value [array(0 => object: ReflectionClass, 1 => 'implementsdoubleerface')] is not a type of double
value [object: ReflectionClass] is not a type of double
===DONE===
