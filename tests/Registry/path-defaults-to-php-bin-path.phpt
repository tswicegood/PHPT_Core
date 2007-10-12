--TEST--
If no $path value is set prior to it being requested, it will equal dirname($_ENV['_'])
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
