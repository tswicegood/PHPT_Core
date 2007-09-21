--TEST--
Domain51_Test_Case should be instantiated with the following parameters:

* $name: string - the contents of the TEST section
* $filename: string - the full-path of the file that represents this test
* $code: string - the raw PHP of this test case
* $sections: array - an array of sections dealing with this test case
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
assert('$case->name == $name');
assert('$case->filename == $filename');
assert('$case->code == $code');
assert('$case->sections == $sections');

assert('file_exists($case->filename)');

?>
===DONE===
--EXPECT--
===DONE===