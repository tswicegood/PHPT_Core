--TEST--
PHPT_Section_COOKIE implements PHPT_Section_CgiExecutable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_COOKIE');
assert('$reflection->implementsInterface("PHPT_Section_CgiExecutable")');

?>
===DONE===
--EXPECT--
===DONE===

