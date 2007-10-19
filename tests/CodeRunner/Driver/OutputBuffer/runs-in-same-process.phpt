--TEST--
PHPT_CodeRunner_Driver_OutputBuffer runs in the same process as the script calling run()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo getmypid(); ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_OutputBuffer($caller);
$result = $runner->run($filename);

assert('$result->output == getmypid()');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===