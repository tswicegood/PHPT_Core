--TEST--
Domain51_Test_Case should be instantiated with a SectionList with the required sections as
defined by Domain51_Test_Case_Validator
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
    $file
));

$case = new Domain51_Test_Case($sections);
assert('$case->name == $name');
assert('$case->filename == $filename');
assert('$case->code == $code');
assert('$case->sections == $sections');

assert('file_exists($case->filename)');

?>
===DONE===
--EXPECT--
===DONE===