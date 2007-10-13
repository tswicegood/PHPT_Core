--TEST--
Specifies PHPT_Reporter::onEnd()
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onEnd');
assert('$reflection->getNumberOfParameters() == 0');

?>
===DONE===
--EXPECT--
===DONE===