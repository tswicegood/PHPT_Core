--TEST--
PHPT_Section_FILEModifier provides a modifyFile(PHPT_Section_FILE $file) method
--FILE--
<?php

require_once  dirname(__FILE__) . '/../../_setup.inc';

$interface = new ReflectionClass('PHPT_Section_FILEModifier');
assert('$interface->hasMethod("modifyFile")');

$method = $interface->getMethod('modifyFile');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "file"');
assert('$param->getClass()->getName() == "PHPT_Section_FILE"');

?>
===DONE===
--EXPECT--
===DONE===
