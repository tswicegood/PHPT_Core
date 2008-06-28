--TEST--
When PHPT_Section_EXPECTREGEX_UnexpectedOutputException is instantiated, it creates
a .diff file with the expected output
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$filename = dirname(__FILE__) . '/foobar.phpt';
$case = new PHPT_SimpleTestCase();
$case->filename = $filename;

$exception = new PHPT_Section_EXPECTREGEX_UnexpectedOutputException($case, 'one');

$expected = "001- one" . PHP_EOL .
    "001+ two";

assert('file_exists($filename . ".diff")');
assert('trim(file_get_contents($filename . ".diff")) == trim($expected)');


?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
