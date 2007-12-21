--TEST--
PHPT_Section_FILEModifier provides a modifyFILE(PHPT_Section_FILE $file) method
--FILE--
<?php

require_once  dirname(__FILE__) . '/../../_setup.inc';

$interface = new ReflectionClass('PHPT_Section_FILEModifier');
assert('$interface->hasMethod("modifyFILE")');

$method = $interface->getMethod('modifyFILE');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "file"');
assert('$param->getClass()->getName() == "PHPT_Section_FILE"');

?>
===DONE===
--EXPECT--
===DONE===
