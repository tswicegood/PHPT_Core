--TEST--
$filename is readable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/fake-test-case.php';
$section = new PHPT_Section_FILE('');
$section->filename = $filename;

assert('$section->filename == $filename');

?>
===DONE===
--EXPECT--
===DONE===
