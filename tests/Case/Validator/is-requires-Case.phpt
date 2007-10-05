--TEST--
When is() is run, it requires a PHPT_Case to run against
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Case_Validator', 'is');
assert('$reflection->getNumberOfParameters() > 0');
$param = array_shift($reflection->getParameters());
assert('$param->getClass()->getName() == "PHPT_Case"');

?>
===DONE===
--EXPECT--
===DONE===