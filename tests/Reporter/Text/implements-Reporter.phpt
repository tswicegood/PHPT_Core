--TEST--
PHPT_Reporter_Text implements PHPT_Reporter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Reporter_Text');
assert('$reflection->implementsInterface("PHPT_Reporter")');

?>
===DONE===
--EXPECT--
===DONE===
