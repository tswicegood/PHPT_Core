--TEST--
Domain51_Test_SectionList should be instantiated with an array or null
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('Domain51_Test_SectionList');
assert('$reflection->hasMethod("__construct")');
$construct = $reflection->getConstructor();
assert('$construct->getNumberOfParameters() >= 1');
$param = array_shift($construct->getParameters());
assert('$param->isOptional()');
assert('$param->isArray()');

?>
===DONE===
--EXPECT--
===DONE===