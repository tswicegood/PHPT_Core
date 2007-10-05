--TEST--
When a PHPT_Section_Clean object is destroyed, it removes the
file it created during run().
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$random = rand(100, 200);
$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . "/some-random-{$random}-test.php";

$clean = new PHPT_Section_Clean('foo');
$clean->run($case);
$clean_filename = $clean->filename;
unset($clean);
assert('!file_exists($clean_filename)');

?>
===DONE===
--EXPECT--
===DONE===
