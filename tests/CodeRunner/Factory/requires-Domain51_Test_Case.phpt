--TEST--
Domain51_Test_CodeRunner_Factory::factory requires a Domain51_Test_Case object
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('Domain51_Test_CodeRunner_Factory', 'factory');
$params = $reflection->getParameters();
$param = array_shift($params);
assert('$param->getClass()->getName() == "Domain51_Test_Case"');

?>
===DONE===
--EXPECT--
===DONE===