--TEST--
PHPT_Assertion requires a getMessage() method
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Assertion');
assert('$reflection->hasMethod("getMessage")');

?>
===DONE===
--EXPECT--
===DONE===
