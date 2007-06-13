--TEST--
Test_Parser->parse() throws an exception when an unknown section is encountered
--FILE--
<?php
//STRIP_AT_PACKAGE
set_include_path(dirname(__FILE__) . '/../../../src');
//END_STRIP_AT_PACKAGE

$test_code = '<?php echo "hello"; ?>';
$sample = '-' . '-' . "TEST--
Some test name\n";
$sample .= '-' . '-' . 'UNKNOWN--
<?php

echo "setup ran\n";

?>' . "\n";
$sample .= '-' . '-' . "FILE--
{$test_code}";

$filename = tempnam(sys_get_temp_dir(), 'runtest_' . rand(1000, 9000));
$fp = fopen($filename, 'w');
fwrite($fp, $sample);
fclose($fp);

require_once 'Test/Parser.php';

$parser = new Test_Parser();
try {
    $case = $parser->parse($filename);
    assert('false == "did not catch exception"');
} catch (Test_Parser_Exception $e) {
    assert('$e->getMessage() == "encountered unknown section: [UNKNOWN]"');
}

?>
--EXPECT--