--TEST--
Creates a file with a given name and contents
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/File.php';

$filename = tempnam(sys_get_temp_dir(), 'runtest_' . rand(1000, 9000));
// sanity check
assert('file_exists($filename)');
assert('filesize($filename) == 0');

$random = 'contents_' . rand(1, 100000);
$file = new Test_File($filename, $random);

// filesize($filename) doesn't work here for some reason
assert('strlen(file_get_contents($filename)) == strlen($random)');

?>
--EXPECT--