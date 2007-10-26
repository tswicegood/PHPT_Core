--TEST--
PHPT_Section_FILE implements PHPT_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$file = new PHPT_Section_FILE('');
assert('$file instanceof PHPT_Section_Runnable');

?>
===DONE===
--EXPECT--
===DONE===
