--TEST--
If update() is called the current value in the $code property is put
into the current value of $filename.
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
    new Domain51_Test_Section_Test('foobar'),
    $file,
));

$case = new Domain51_Test_Case($sections);
assert('trim(file_get_contents($filename)) == trim($code)');

$case->code = 'Updated code';

assert('trim(file_get_contents($filename)) == "Updated code"');


?>
===DONE===
--EXPECT--
===DONE===