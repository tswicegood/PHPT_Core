--TEST--
Specifies PHPT_Reporter::onParserError(Exception $exception)
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Reporter');
assert('$reflection->hasMethod("onParserError")');

$method = $reflection->getMethod('onParserError');
assert('$method->getNumberOfParameters() == 1');

$param = array_shift($method->getParameters());
assert('$param->getName() == "exception"');
assert('!is_null($param->getClass())');
assert('$param->getClass()->getName() == "Exception"');

?>
===DONE===
--EXPECT--
===DONE===

