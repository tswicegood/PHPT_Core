--TEST--
When PHPT_Section_Expectregex_UnexpectedOutputException is instantiated, it creates
a .exp file with the expected output
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
$case = new PHPT_SimpleTestCase();
$case->filename = $filename;

$random = 'Random Int: ' . rand(100, 200);
$exception = new PHPT_Section_Expectregex_UnexpectedOutputException($case, $random);

assert('file_exists($filename . ".exp")');
assert('trim(file_get_contents($filename . ".exp")) == trim($random)');


?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===