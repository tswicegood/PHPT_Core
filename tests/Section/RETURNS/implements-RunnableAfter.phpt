--TEST--
PHPT_Section_RETURNS implements PHPT_Section_RunnableAfter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_RETURNS');
assert('$reflection->implementsInterface("PHPT_Section_RunnableAfter")');

?>
===DONE===
--EXPECT--
===DONE===


