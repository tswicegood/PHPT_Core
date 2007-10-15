--TEST--
Specifies PHPT_Reporter::onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onCaseSkip');
assert('$reflection->getNumberOfParameters() == 2');
$parameters = $reflection->getParameters();
$param = array_shift($parameters);
assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');

$param = array_shift($parameters);
assert('$param->getName() == "veto"');
assert('$param->getClass()->getName() == "PHPT_Case_VetoException"');
?>
===DONE===
--EXPECT--
===DONE===
