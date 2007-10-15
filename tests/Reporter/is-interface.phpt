--TEST--
PHPT_Reporter is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Reporter');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===
