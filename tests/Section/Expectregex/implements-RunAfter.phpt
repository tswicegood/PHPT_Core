--TEST--
PHPT_Section_Expectregex implements PHPT_Section_RunAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Expectregex('');
assert('$section instanceof PHPT_Section_RunAfter');

?>
===DONE===
--EXPECT--
===DONE===
