--TEST--
PHPT_Assert_Type can determine if the value is a null
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$test = new PHPT_Assert_Type('null', true);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', false);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', array());
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', array(123, 234));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', 'hello world');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', 123);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', 123.321);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', '123');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', '123.321');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$assertion = new PHPT_Assert_Type('null', true);
$test = new PHPT_Assert_Type('null', $assertion);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', null);
assert('$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
$test = new PHPT_Assert_Type('null', $fp);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', 'strtolower');
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', array('ReflectionClass', 'export'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$reflection = new ReflectionClass('PHPT_Assert_Type');
$test = new PHPT_Assert_Type('null', array($reflection, 'implementsnullerface'));
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

$test = new PHPT_Assert_Type('null', $reflection);
assert('!$test->getStatus()');
echo $test->getMessage(), "\n";
unset($test);

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
value [true] is not a type of null
value [false] is not a type of null
value [array()] is not a type of null
value [array(0 => 123, 1 => 234)] is not a type of null
value ['hello world'] is not a type of null
value [123] is not a type of null
value [123.321] is not a type of null
value ['123'] is not a type of null
value ['123.321'] is not a type of null
value [object: PHPT_Assert_Type] is not a type of null
value [NULL] is a type of null
value [resource] is not a type of null
value ['strtolower'] is not a type of null
value [array(0 => 'ReflectionClass', 1 => 'export')] is not a type of null
value [array(0 => object: ReflectionClass, 1 => 'implementsnullerface')] is not a type of null
value [object: ReflectionClass] is not a type of null
===DONE===
