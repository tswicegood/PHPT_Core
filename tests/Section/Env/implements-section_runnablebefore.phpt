--TEST--
PHPT_Section_ENV implements PHPT_Section_RunnableBefore
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_ENV');
assert('$reflection->implementsInterface("PHPT_Section_RunnableBefore")');

?>
===DONE===
--EXPECT--
===DONE===

