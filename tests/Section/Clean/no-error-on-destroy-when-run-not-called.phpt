--TEST--
If PHPT_Section_CLEAN is destroyed prior to run() being called,
no errors are thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$clean = new PHPT_Section_CLEAN('');
unset($clean);

?>
===DONE===
--EXPECT--
===DONE===
