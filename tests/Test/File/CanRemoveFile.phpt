--TEST--
Can remove a file that it represents
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/File.php';
$filename = tempnam(sys_get_temp_dir(), 'runtest_' . rand(1000, 9000));
$file = new Test_File($filename, '');
$file->remove();

assert('file_exists($filename) == false');
?>
--EXPECT--