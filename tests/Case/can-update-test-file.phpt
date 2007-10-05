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
$file = new PHPT_Section_File($code);
$file->filename = $filename;

$sections = new PHPT_SectionList(array(
    new PHPT_Section_Test('foobar'),
    $file,
));

$case = new PHPT_Case($sections);
assert('trim(file_get_contents($filename)) == trim($code)');

$case->code = 'Updated code';

assert('trim(file_get_contents($filename)) == "Updated code"');


?>
===DONE===
--EXPECT--
===DONE===
