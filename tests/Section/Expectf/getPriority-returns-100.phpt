--TEST--
PHPT_Section_EXPECTF::getPriority() returns 100
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_EXPECTF('');
assert('$section->getPriority() === 100');

?>
===DONE===
--EXPECT--
===DONE===
