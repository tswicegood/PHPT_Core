--TEST--
When a Domain51_Test_Case is destroyed, it automatically clears the
test file it created
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";
$file = new Domain51_Test_Section_File($code);
$file->filename = $filename;

$sections = new Domain51_Test_SectionList(array(
    new Domain51_Test_Section_Test('Some test case name'),
    $file
));

$case = new Domain51_Test_Case($sections);
assert('file_exists($filename)');
unset($case);
assert('!file_exists($filename)');

?>
===DONE===
--EXPECT--
===DONE===