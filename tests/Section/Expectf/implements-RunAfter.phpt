--TEST--
PHPT_Section_Expectf implements PHPT_Section_RunAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Expectf('');
assert('$section instanceof PHPT_Section_RunAfter');

?>
===DONE===
--EXPECT--
===DONE===
