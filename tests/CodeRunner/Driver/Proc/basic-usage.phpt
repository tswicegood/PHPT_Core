--TEST--
Will take a file and run it through a PHP parser and return a
PHPT_CodeRunner_Driver_Proc_Result object.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(100, 200);
$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Random Int: ' . $random . '"; ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$result = $runner->run($filename);

assert('$result instanceof PHPT_CodeRunner_Result');
assert('$result->filename == $filename');
$expected_output = "Random Int: {$random}";
assert('$result->output == $expected_output');
?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
