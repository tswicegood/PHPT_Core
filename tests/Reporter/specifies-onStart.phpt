--TEST--
Specifies PHPT_Reporter::onStart()
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionMethod('PHPT_Reporter', 'onStart');
assert('$reflection->getNumberOfParameters() == 0');

?>
===DONE===
--EXPECT--
===DONE===
