--TEST--
PHPT_Section_Post implements PHPT_Section_EnvModifier
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_Post');
assert('$reflection->implementsInterface("PHPT_Section_EnvModifier")');

?>
===DONE===
--EXPECT--
===DONE===
