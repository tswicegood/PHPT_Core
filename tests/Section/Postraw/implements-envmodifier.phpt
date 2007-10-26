--TEST--
PHPT_Section_POSTRAW implements PHPT_Section_ENVModifier
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_POSTRAW');
assert('$reflection->implementsInterface("PHPT_Section_ENVModifier")');

?>
===DONE===
--EXPECT--
===DONE===
