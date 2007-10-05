--TEST--
PHPT_Section_Cookie implements PHPT_Section_EnvModifier
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_Cookie');
assert('$reflection->implementsInterface("PHPT_Section_EnvModifier")');

?>
===DONE===
--EXPECT--
===DONE===
