--TEST--
Specifies a run(array $options = array()) method
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Controller', 'run');
assert('$reflection->getNumberOfParameters() == 1');

$param = array_shift($reflection->getParameters());
assert('$param->getName() == "options"');
assert('$param->isArray()');
assert('$param->isOptional()');
assert('$param->getDefaultValue() == array()');

?>
===DONE===
--EXPECT--
===DONE===
