--TEST--
Can recurse through directories looking for test cases
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$test_path = dirname(__FILE__) . '/../../tests-supporting/tests';
$collector = new PHPT_Suite_Factory();
$list = $collector->collect($test_path, true);

assert('count($list) == 5');

?>
===DONE===
--EXPECT--
===DONE===
