--TEST--
PHPT_CodeRunner_Driver_Abstract declares a validate() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionMethod('PHPT_CodeRunner_Driver_Abstract', 'validate');
assert('$reflection->isAbstract()');

?>
===DONE===
--EXPECT--
===DONE===
