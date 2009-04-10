--TEST--
Should always return a Case that has a ENV section
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$test_file = dirname(__FILE__) . '/simple-test-case.phpt';
copy($test_file . '-', $test_file);
$test_case_file = substr($test_file, 0, -1);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_file);

assert('$case->sections->has("ENV")');

?>
===DONE===
--EXPECT--
===DONE===

