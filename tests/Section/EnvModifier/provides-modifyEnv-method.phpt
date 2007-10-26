--TEST--
The PHPT_Section_ENVModifier interface signifies that an object implementing
it has the following method:

* modifyEnv(PHPT_Section_ENV $env)
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_ENVModifier');
assert('$reflection->hasMethod("modifyEnv")');
$method = $reflection->getMethod('modifyEnv');
assert('$method->getNumberOfParameters() == 1');
$param = array_shift($method->getParameters());
assert('$param->getName() == "env"');
assert('$param->getClass()->getName() == "PHPT_Section_ENV"');

?>
===DONE===
--EXPECT--
===DONE===
