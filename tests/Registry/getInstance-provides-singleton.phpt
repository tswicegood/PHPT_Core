--TEST--
PHPT_Registry::getInstance() returns the same instance of the PHPT_Registry
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$registry = PHPT_Registry::getInstance();
assert('$registry instanceof PHPT_Registry');
assert('$registry === PHPT_Registry::getInstance()');


?>
===DONE===
--EXPECT--
===DONE===