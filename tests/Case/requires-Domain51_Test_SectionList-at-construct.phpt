--TEST--
The first parameter of the constructor is a required Domain51_Test_SectionList
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$constructor = new ReflectionMethod('Domain51_Test_Case', '__construct');
assert('$constructor->getNumberOfParameters() >= 1');
$param = array_shift($constructor->getParameters());
assert('$param->getClass()->getName() == "Domain51_Test_SectionList"');

?>
===DONE===
--EXPECT--
===DONE===