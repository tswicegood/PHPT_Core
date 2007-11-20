--TEST--
PHPT_Section_Runnable specifies a getPriority() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$interface = new ReflectionClass('PHPT_Section_Runnable');
assert('$interface->hasMethod("getPriority")');

?>
===DONE===
--EXPECT--
===DONE===
