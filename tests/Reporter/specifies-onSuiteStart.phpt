--TEST--
Specifies PHPT_Reporter::onSuiteStart(PHPT_Suite $suite)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onSuiteStart');
assert('$reflection->getNumberOfParameters() == 1');
$param = array_shift($reflection->getParameters());
assert('$param->getName() == "suite"');
assert('$param->getClass()->getName() == "PHPT_Suite"');

?>
===DONE===
--EXPECT--
===DONE===
