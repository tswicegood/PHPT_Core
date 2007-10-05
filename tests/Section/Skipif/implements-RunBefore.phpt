--TEST--
PHPT_Section_Skipif implements PHPT_Section_RunBefore 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_Skipif('');
assert('$section instanceof PHPT_Section_RunBefore');

?>
===DONE===
--EXPECT--
===DONE===
