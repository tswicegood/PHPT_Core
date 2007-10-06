--TEST--
The PHPT_Section_EnvModifier interface signifies that an object implementing
it has the following method:

* modifyEnv(PHPT_Section_Env $env, PHPT_Case $case)
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_EnvModifier');
assert('$reflection->hasMethod("modifyEnv")');
$method = $reflection->getMethod('modifyEnv');
assert('$method->getNumberOfParameters() == 2');

$params = $method->getParameters();
$param = array_shift($params);
assert('$param->getName() == "env"');
assert('$param->getClass()->getName() == "PHPT_Section_Env"');

$param = array_shift($params);
assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');
?>
===DONE===
--EXPECT--
===DONE===
