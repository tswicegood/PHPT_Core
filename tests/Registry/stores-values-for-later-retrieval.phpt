--TEST--
PHPT_Registry stores values as properties that can be retrieved
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$registry = new PHPT_Registry();
$registry->foo = 'bar';
assert('$registry->foo == "bar"');

$random = rand(100, 200);
$registry->random = $random;
assert('$registry->random == $random');

?>
===DONE===
--EXPECT--
===DONE===