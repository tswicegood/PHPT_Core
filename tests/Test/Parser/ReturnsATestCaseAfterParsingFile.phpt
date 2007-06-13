--TEST--
Test_Parser->parse() returns a Test_Case object
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Parser.php';

$sample = '';
$filename = tempnam(sys_get_temp_dir(), 'runtest_' . rand(1000, 9000));
$file = new Test_File($filename, $sample);

$parser = new Test_Parser();
$case = $parser->parse($file);

assert('$case instanceof Test_Case');
echo 'complete';
?>
--EXPECT--
complete