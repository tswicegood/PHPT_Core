--TEST--
PHPT_Section_INI::getPriority() returns 0
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini = new PHPT_Section_INI();
assert('$ini->getPriority() === 0');

?>
===DONE===
--EXPECT--
===DONE===


