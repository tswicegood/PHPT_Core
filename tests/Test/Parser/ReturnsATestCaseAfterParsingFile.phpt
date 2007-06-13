--TEST--
Test_Parser->parse() returns a Test_Case object
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

require_once 'Test/Parser.php';

// break up the token so the phpt parser doesn't catch this and think it's
// part of the actual test definitions
$test_code = "<?php

echo 'Hello World!';

?>";
$sample = '-' . '-' . "TEST--
Some test name\n";
$sample .= '-' . '-' . "FILE--
{$test_code}";

$filename = tempnam(sys_get_temp_dir(), 'runtest_' . rand(1000, 9000));
$fp = fopen($filename, 'w');
fwrite($fp, $sample);
fclose($fp);

$parser = new Test_Parser();
$case = $parser->parse($filename);

assert('$case instanceof Test_Case');
assert('$case->contents == $test_code');
assert('$case->name == "Some test name"');
ob_start();
$result = $case->run();
ob_end_clean();
assert('$result');

unlink($filename);
echo 'complete';
?>
--EXPECT--
complete