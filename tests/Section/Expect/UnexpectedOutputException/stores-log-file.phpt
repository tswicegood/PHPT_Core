--TEST--
When PHPT_Section_EXPECT_UnexpectedOutputException is instantiated, it creates
a .exp file with the expected output
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
$case = new PHPT_SimpleTestCase();
$case->filename = $filename;

$exception = new PHPT_Section_EXPECT_UnexpectedOutputException($case, "one");

$log = '---- EXPECTED OUTPUT
one
---- ACTUAL OUTPUT
two
---- FAILED';

assert('file_exists($filename . ".log")');
assert('trim(file_get_contents($filename . ".log")) == trim($log)');


?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
