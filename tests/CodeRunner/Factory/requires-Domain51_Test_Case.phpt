--TEST--
PHPT_CodeRunner_Factory::factory requires a PHPT_Case object
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('PHPT_CodeRunner_Factory', 'factory');
$params = $reflection->getParameters();
$param = array_shift($params);
assert('$param->getClass()->getName() == "PHPT_Case"');

?>
===DONE===
--EXPECT--
===DONE===
