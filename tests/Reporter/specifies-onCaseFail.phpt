--TEST--
Specifies PHPT_Reporter::onCaseFail(PHPT_Case $case, Exception $exception)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onCaseFail');
assert('$reflection->getNumberOfParameters() == 2');
$parameters = $reflection->getParameters();
$param = array_shift($parameters);
assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');

$param = array_shift($parameters);
assert('$param->getName() == "exception"');
assert('$param->getClass()->getName() == "Exception"');
?>
===DONE===
--EXPECT--
===DONE===