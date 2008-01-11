--TEST--
PHPT_Section_INIModifier declares modifyINI(PHPT_Section_INI $ini)
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_INIModifier');
assert('$reflection->hasMethod("modifyINI")');

$method = $reflection->getMethod('modifyINI');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "ini"');
assert('!is_null($param->getClass())');
assert('$param->getClass()->getName() == "PHPT_Section_INI"');

?>
===DONE===
--EXPECT--
===DONE===

