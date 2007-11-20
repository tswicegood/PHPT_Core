--TEST--
Specifies a run(PHPT_Case $case) method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$interface = new ReflectionClass('PHPT_Section_Runnable');
assert('$interface->hasMethod("run")');

$method = new ReflectionMethod('PHPT_Section_Runnable', 'run');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');

?>
===DONE===
--EXPECT--
===DONE===
