--TEST--
PHPT_Section_GET implements PHPT_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_GET');
assert('$reflection->implementsInterface("PHPT_Section")');

?>
===DONE===
--EXPECT--
===DONE===
