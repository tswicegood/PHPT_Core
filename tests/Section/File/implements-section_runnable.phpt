--TEST--
PHPT_Section_File implements PHPT_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$file = new PHPT_Section_File('');
assert('$file instanceof PHPT_Section_Runnable');

?>
===DONE===
--EXPECT--
===DONE===
