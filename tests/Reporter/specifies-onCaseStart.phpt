--TEST--
Specifies PHPT_Reporter::onCaseStart(PHPT_Case $case)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onCaseStart');
assert('$reflection->getNumberOfParameters() == 1');
$param = array_shift($reflection->getParameters());
assert('$param->getName() == "case"');
assert('$param->getClass()->getName() == "PHPT_Case"');

?>
===DONE===
--EXPECT--
===DONE===
