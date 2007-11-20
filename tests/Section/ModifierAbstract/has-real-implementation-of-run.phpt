--TEST--
PHPT_Section_ModifiableAbstract has a real run() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_ModifiableAbstract');
assert('$reflection->hasMethod("run")');
assert('$reflection->getMethod("run")->isAbstract() === false');

?>
===DONE===
--EXPECT--
===DONE===
