--TEST--
The first parameter of the constructor is a required PHPT_SectionList
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$constructor = new ReflectionMethod('PHPT_Case', '__construct');
assert('$constructor->getNumberOfParameters() >= 1');
$param = array_shift($constructor->getParameters());
assert('$param->getClass()->getName() == "PHPT_SectionList"');

?>
===DONE===
--EXPECT--
===DONE===
