--TEST--
PHPT_Section_EXPECTREGEX implements PHPT_Section_RunnableAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_EXPECTREGEX('');
assert('$section instanceof PHPT_Section_RunnableAfter');

?>
===DONE===
--EXPECT--
===DONE===
