--TEST--
When PHPT_Section_FILE::$filename is set, a file is created containing $contents
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = 'Random Int: ' . rand(100, 200);
$section = new PHPT_Section_FILE($random);

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
