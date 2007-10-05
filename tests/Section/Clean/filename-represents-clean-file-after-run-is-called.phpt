--TEST--
Once PHPT_Section_Clean::run() is invoked, the $filename property represents
a file on the filesystem.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$clean = new PHPT_Section_Clean('');
$clean->run($case);

assert('!empty($clean->filename)');
assert('file_exists($clean->filename)');

?>
===DONE===
--EXPECT--
===DONE===
