--TEST--
If the $leave_file property is set to true on PHPT_Case,
the test file will not be destroyed when the test case is destructed
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$name = "Same test case name";
$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";

$file = new PHPT_Section_FILE($code);
$file->filename = $filename;

$sections = new PHPT_SectionList(array(
    new PHPT_Section_TEST($name),
    $file,
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
assert('file_exists($filename)');
$case->leave_file = true;
unset($case);
assert('file_exists($filename)');

unlink($filename);

?>
===DONE===
--EXPECT--
===DONE===
