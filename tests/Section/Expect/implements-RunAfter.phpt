--TEST--
PHPT_Section_Expect implements PHPT_Section_RunnableAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Expect('');
assert('$section instanceof PHPT_Section_RunnableAfter');

?>
===DONE===
--EXPECT--
===DONE===
