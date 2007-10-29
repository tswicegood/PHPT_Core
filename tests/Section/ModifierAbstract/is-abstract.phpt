--TEST--
PHPT_Section_ModifiableAbstract is an abstract class
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_ModifiableAbstract');
assert('$reflection->isAbstract()');

?>
===DONE===
--EXPECT--
===DONE===