--TEST--
Takes an array for $environment and passes it to the code being run
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$code = '<?php echo getenv("foobar_message"); ?>';
$filename = dirname(__FILE__) . '/foobar.php';
file_put_contents($filename, $code);

$random = rand(100, 200);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->environment = array(
    'foobar_message' => $random,
);
$result = $runner->run($filename);

assert('trim($result->output) == $random');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
