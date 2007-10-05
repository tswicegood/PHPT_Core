--TEST--
PHPT_Section_Expect implements PHPT_Section_RunAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Expect('');
assert('$section instanceof PHPT_Section_RunAfter');

?>
===DONE===
--EXPECT--
===DONE===
