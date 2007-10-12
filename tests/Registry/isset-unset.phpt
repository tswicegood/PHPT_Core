--TEST--
isset() and unset() can be called with the anticipated behavior
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$registry = new PHPT_Registry();

assert('!isset($registry->foo)');
$registry->foo = 'bar';
assert('isset($registry->foo)');
unset($registry->foo);
assert('!isset($registry->foo)');

?>
===DONE===
--EXPECT--
===DONE===
