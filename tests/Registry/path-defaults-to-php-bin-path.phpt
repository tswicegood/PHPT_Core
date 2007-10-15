--TEST--
If no $path value is set prior to it being requested, it will equal dirname($_ENV['_'])
if it exists
--SKIPIF--
<?php if (getenv('_') == '') echo 'skip - ENV[_] is not set'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$registry = new PHPT_Registry();
assert('isset($registry->path)');
assert('$registry->path == dirname(getenv("_"))');

?>
===DONE===
--EXPECT--
===DONE===
