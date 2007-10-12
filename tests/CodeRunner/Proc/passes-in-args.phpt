--TEST--
$args is passed in as arguments within the code
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = "<?php echo 'Random Int: ' . \$argv[1]; ?>";
file_put_contents($filename, $code);

$random = rand(100, 200);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->args = " -- $random";
$result = $runner->run($filename);

$expected_output = 'Random Int: ' . $random;
assert('$result->output == $expected_output');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
