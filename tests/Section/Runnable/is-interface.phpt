--TEST--
PHPT_Section_Runnable is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_Runnable');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===