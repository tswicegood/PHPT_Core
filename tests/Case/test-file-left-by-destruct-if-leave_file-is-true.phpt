--TEST--
If the $leave_file property is set to true on Domain51_Test_Case,
the test file will not be destroyed when the test case is destructed
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$name = "Same test case name";
$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";

$file = new Domain51_Test_Section_File($code);
$file->filename = $filename;

$sections = new Domain51_Test_SectionList(array(
    new Domain51_Test_Section_Test($name),
    $file,
));

$case = new Domain51_Test_Case($sections);
assert('file_exists($filename)');
$case->leave_file = true;
unset($case);
assert('file_exists($filename)');

unlink($filename);

?>
===DONE===
--EXPECT--
===DONE===