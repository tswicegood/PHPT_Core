--TEST--
PHPT_Section_SKIPIF::getPriority() returns 0
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_SKIPIF('');
assert('$section->getPriority() === 0');

?>
===DONE===
--EXPECT--
===DONE===