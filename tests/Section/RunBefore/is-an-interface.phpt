--TEST--
PHPT_Section_RunnableBefore is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_RunnableBefore');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===
