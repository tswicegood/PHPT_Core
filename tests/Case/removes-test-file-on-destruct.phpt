--TEST--
When a Domain51_Test_Case is destroyed, it automatically clears the
test file it created
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$name = "Same test case name";
$filename = dirname(__FILE__) . '/some-fake-test-case.php';
$code = "<?php
echo 'Hello world...';
?>";
$sections = array();

$case = new Domain51_Test_Case($name, $filename, $code, $sections);
assert('file_exists($filename)');
unset($case);
assert('!file_exists($filename)');

?>
===DONE===
--EXPECT--
===DONE===