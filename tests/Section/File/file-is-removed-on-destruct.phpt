--TEST--
When a Section_File object is destroyed, the file is removed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/fake-test-case.php';
$section = new PHPT_Section_File('Hello World!');
$section->filename = $filename;

assert('file_exists($section->filename)');
unset($section);

assert('file_exists($filename) == false');

?>
===DONE===
--EXPECT--
===DONE===
