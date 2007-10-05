--TEST--
Requires an instance of PHPT_CodeRunner_Abstract at instanciation
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$constructor = new ReflectionMethod('PHPT_CodeRunner_CommandLine', '__construct');
$param = array_shift($constructor->getParameters());

assert('$param->getClass()->getName() == "PHPT_CodeRunner_Abstract"');

?>
===DONE===
--EXPECT--
===DONE===