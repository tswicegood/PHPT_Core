--TEST--
PHPT_Suite requries an array at instantiation
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$constructor = new ReflectionMethod('PHPT_Suite', '__construct');
assert('$constructor->getNumberOfParameters() >= 1');

$param = array_shift($constructor->getParameters());
assert('$param->isArray()');

?>
===DONE===
--EXPECT--
===DONE===
