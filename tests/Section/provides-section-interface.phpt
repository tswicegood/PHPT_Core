--TEST--
Domain51_Test_Section provides an interface to insure a section
properly implements the following method(s):

* run(Domain51_Test_Case $case)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$reflection = new ReflectionClass('Domain51_Test_Section');
assert('$reflection->isInterface()');
assert('$reflection->hasMethod("run")');

$run = $reflection->getMethod('run');
assert('$run->getNumberOfRequiredParameters() == 1');
$run_parameter = array_shift($run->getParameters());
assert('$run_parameter->getClass()->getName() == "Domain51_Test_Case"');

?>
===DONE===
--EXPECT--
===DONE===