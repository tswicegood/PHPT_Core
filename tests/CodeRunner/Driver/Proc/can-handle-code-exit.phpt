--TEST--
CodeRunner_Driver_Proc can handle executing code that exits during its execution
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(100, 200);
$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Hi..."; exit(101); ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$result = $runner->run($filename);

echo $result->output, PHP_EOL;
echo $result->exitcode, PHP_EOL;

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
Hi...
101
===DONE===
