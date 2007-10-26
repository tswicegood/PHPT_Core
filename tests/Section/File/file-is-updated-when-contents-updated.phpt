--TEST--
When $contents is updated and $filename is not empty, $contents is written to the $filename
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/fake-test-case.php';
$section = new PHPT_Section_FILE('');
$section->filename = $filename;

assert('filesize($filename) == 0');
$section->contents = rand(100, 999);

// insure stat cache is cleared
clearstatcache();

assert('filesize($filename) == 3');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/fake-test-case.php'); ?>
--EXPECT--
===DONE===
