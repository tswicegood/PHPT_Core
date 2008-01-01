--TEST--
PHPT_Suite_Visitor defines a visit(PHPT_Suite $suite) method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$interface = new ReflectionClass('PHPT_Suite_Visitor');
assert('$interface->hasMethod("visit")');

$method = $interface->getMethod('visit');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "suite"');
assert('$param->getClass() !== null');
assert('$param->getClass()->getName() == "PHPT_Suite"');

?>
===DONE===
--EXPECT--
===DONE===

