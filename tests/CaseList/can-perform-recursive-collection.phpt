--TEST--
Can recurse through directories looking for test cases
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$test_path = dirname(__FILE__) . '/../_support/tests';
$collector = new PHPT_Case_Collector();
$list = $collector->collect($test_path, true);

assert('count($list) == 5');

?>
===DONE===
--EXPECT--
===DONE===