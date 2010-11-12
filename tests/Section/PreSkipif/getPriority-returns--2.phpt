--TEST--
PHPT_Section_PRESKIPIF::getPriority() returns -2
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_PRESKIPIF('');
assert('$section->getPriority() === -2');

?>
===DONE===
--EXPECT--
===DONE===
