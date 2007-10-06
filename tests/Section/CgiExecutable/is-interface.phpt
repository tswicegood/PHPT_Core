--TEST--
PHPT_Section_CgiExecutable is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_CgiExecutable');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===