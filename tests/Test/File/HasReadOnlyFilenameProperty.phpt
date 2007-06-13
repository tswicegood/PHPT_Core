--TEST--
Test_File::$filename contains the full-path of the test file
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/File.php';
$filename = tempnam(sys_get_temp_dir(), '');
$contents = 'random integer: ' . rand(1000, 2000);

$file = new Test_File($filename, $contents);
assert('$file->filename == $filename');
try {
    $file->filename = 'new value';
    assert('false == "uncaught exception"');
} catch (Test_File_Exception $e) {
    assert('$e->getMessage() == "attempted to set read-only \"filename\" property"');
}
?>
--EXPECT--
--CLEAN--
<?php
@unlink($filename);