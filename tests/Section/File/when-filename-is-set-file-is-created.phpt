--TEST--
When Domain51_Test_Section_File::$filename is set, a file is created containing $contents
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = 'Random Int: ' . rand(100, 200);
$section = new Domain51_Test_Section_File($random);

$filename = dirname(__FILE__) . '/fake-test-case.php';

assert('file_exists($filename) == false');
$section->filename = $filename;
assert('file_exists($filename) == true');

assert('trim(file_get_contents($filename)) == $random');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/fake-test-case.php'); ?>
--EXPECT--
===DONE===