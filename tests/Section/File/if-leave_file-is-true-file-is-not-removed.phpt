--TEST--
If the $leave_file property is set to true, the created file will not be removed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/fake-test-case.php';
$section = new Domain51_Test_Section_File('Hello World!');
$section->filename = $filename;

assert('file_exists($filename)');
$section->leave_file = true;
unset($section);
assert('file_exists($filename)');

@unlink($filename);

?>
===DONE===
--EXPECT--
===DONE===