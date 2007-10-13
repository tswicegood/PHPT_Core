--TEST--
PHPT_Controller is an interface
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$reflection = new ReflectionClass('PHPT_Controller');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===