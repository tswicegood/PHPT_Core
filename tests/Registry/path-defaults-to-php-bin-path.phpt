--TEST--
If no $path value is set prior to it being requested, it will equal $_ENV['PATH']
if it exists
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';
$registry = new PHPT_Registry();
assert('isset($registry->path)');
assert('(getenv("PATH") !== false && $registry->path == getenv("PATH")) || ' .
       '(getenv("_") !== false && $registry->path == dirname(getenv("_")))');

?>
===DONE===
--EXPECT--
===DONE===
