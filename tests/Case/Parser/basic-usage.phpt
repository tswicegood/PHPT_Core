--TEST--
PHPT_Case_Parser is used to parse a test case file into
its Test_Case and sections form and create the actual test file.
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$test_file = dirname(__FILE__) . '/simple-test-case.phpt';
copy($test_file . '-', $test_file);
$test_case_file = substr($test_file, 0, -1);

$parser = new PHPT_Case_Parser();
$case = $parser->parse($test_file);

assert('$case instanceof PHPT_Case');
assert('$case->name == "This is a sample test case to show that \"Hello World\" can be echoed"');
assert('$case->filename == $test_case_file');
assert('file_exists($case->filename)');
?>
===DONE===
--CLEAN--
<?php
@unlink(dirname(__FILE__) . '/simple-test-case.php');
@unlink(dirname(__FILE__) . '/simple-test-case.phpt');
?>
--EXPECT--
===DONE===
