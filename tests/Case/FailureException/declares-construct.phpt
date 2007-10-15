--TEST--
Declares a __construct(PHPT_Case $case, $reason) as a non-abstract method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Case_FailureException', '__construct');

assert('$reflection->getNumberOfParameters() == 2');

$params = $reflection->getParameters();
$param = array_shift($params);

assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');

$param = array_shift($params);
assert('$param->getName() == "reason"');
assert('$param->isOptional() == false');

?>
===DONE===
--EXPECT--
===DONE===
