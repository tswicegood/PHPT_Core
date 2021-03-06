--TEST--
When a PHPT_Case is destroyed, it automatically clears the
test file it created
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";
$file = new PHPT_Section_FILE($code);
$file->filename = $filename;

$sections = new PHPT_SectionList(array(
    new PHPT_Section_TEST('Some test case name'),
    $file
));

$case = new PHPT_Case($sections, dirname(__FILE__) . '/fake-test-case.phpt');
assert('file_exists($filename)');
unset($case);
assert('!file_exists($filename)');

?>
===DONE===
--EXPECT--
===DONE===
