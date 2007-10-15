--TEST--
PHPT_Suite::run() takes a $reporter parameter that must be a PHPT_Reporter instance
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Suite', 'run');
assert('$reflection->getNumberOfParameters() == 1');

$param = array_shift($reflection->getParameters());
assert('$param->getName() == "reporter"');
assert('$param->getClass()->getName() == "PHPT_Reporter"');

?>
===DONE===
--EXPECT--
===DONE===
