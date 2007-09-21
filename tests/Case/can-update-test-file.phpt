--TEST--
If update() is called the current value in the $code property is put
into the current value of $filename.
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
assert('trim(file_get_contents($filename)) == trim($code)');

$case->code = 'Updated code';
$case->update();

assert('trim(file_get_contents($filename)) == "Updated code"');


?>
===DONE===
--EXPECT--
===DONE===