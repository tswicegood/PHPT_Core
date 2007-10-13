--TEST--
PHPT_Case should be instantiated with a SectionList with the required sections as
defined by PHPT_Case_Validator
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$name = "Same test case name";
$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";

$file = new PHPT_Section_File($code);
$file->filename = $filename;

$sections = new PHPT_SectionList(array(
    new PHPT_Section_Test($name),
    $file
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/some-fake-test-case.phpt');
assert('$case->name == $name');
assert('$case->filename == $filename . "t"');
assert('$case->code == $code');
assert('$case->sections === $sections');

?>
===DONE===
--EXPECT--
===DONE===
