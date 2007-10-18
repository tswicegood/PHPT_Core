--TEST--
PHPT_Reporter_Pear implements PHPT_Reporter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Reporter_Pear');
assert('$reflection->implementsInterface("PHPT_Reporter")');

?>
===DONE===
--EXPECT--
===DONE===
