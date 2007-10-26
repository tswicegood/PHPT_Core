--TEST--
PHPT_Section_EXPECT implements PHPT_Section_RunnableAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_EXPECT('');
assert('$section instanceof PHPT_Section_RunnableAfter');

?>
===DONE===
--EXPECT--
===DONE===
