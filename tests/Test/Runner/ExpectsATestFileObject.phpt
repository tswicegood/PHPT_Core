--TEST--
Test_Runner::run() expects a Test_File object, and creates a ".php" version of the file that isn't
removed until Test_Runner::finish() is called
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Runner.php';

$filename = tempnam(sys_get_temp_dir(), '');
$file = new Test_File($filename, 'Hello World!');

$runner = new Test_Runner();
$runner->run($file);

?>
--EXPECT--
Hello World!
--CLEAN--
<?php
unlink($filename);