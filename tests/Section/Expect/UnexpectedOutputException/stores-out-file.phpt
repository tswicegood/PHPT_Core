--TEST--
When PHPT_Section_Expect_UnexpectedOutputException is instantiated, it creates
a .out file with the actual output
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
$case = new PHPT_SimpleTestCase();
$case->filename = $filename;
$case->output = 'Random Int: ' . rand(100, 200);

$exception = new PHPT_Section_Expect_UnexpectedOutputException($case, 'foobar');

assert('file_exists($filename . ".out")');
assert('trim(file_get_contents($filename . ".out")) == trim($case->output)');


?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
