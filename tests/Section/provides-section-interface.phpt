--TEST--
PHPT_Section provides an interface to insure an object is intended to be used as a
Section.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section');
assert('$reflection->isInterface()');

?>
===DONE===
--EXPECT--
===DONE===
