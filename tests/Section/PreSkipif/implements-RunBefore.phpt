--TEST--
PHPT_Section_PRESKIPIF implements PHPT_Section_RunnableBefore 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_PRESKIPIF('');
assert('$section instanceof PHPT_Section_RunnableBefore');

?>
===DONE===
--EXPECT--
===DONE===
