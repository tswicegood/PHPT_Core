--TEST--
Can recurse through directories looking for test cases
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$test_path = dirname(__FILE__) . '/../../tests-supporting/tests';
$factory = new PHPT_Suite_Factory();
$suite = $factory->factory($test_path, true);

assert('count($suite) == 5');

?>
===DONE===
--EXPECT--
===DONE===
