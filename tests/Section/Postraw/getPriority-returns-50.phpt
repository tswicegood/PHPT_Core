--TEST--
PHPT_Section_POSTRAW::getPriority() returns 50
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$POSTRAW = new PHPT_Section_POSTRAW('');
assert('$POSTRAW->getPriority() === 50');

?>
===DONE===
--EXPECT--
===DONE===
