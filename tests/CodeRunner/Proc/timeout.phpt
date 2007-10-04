--TEST--
The $timeout property allows you to set how long you want to wait for the
running code to completely execute.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = rand(1, 2);
$filename = dirname(__FILE__) . '/foobar.php';
$code = "<?php sleep(" . ($random + 1) . "); ?>";
file_put_contents($filename, $code);

$caller = new Domain51_Test_CodeRunner();
$runner = new Domain51_Test_CodeRunner_Proc($caller);
$runner->timeout = $random;
try {
    $r = $runner->run($filename);
    trigger_error('exception not caught');
} catch (Domain51_Test_CodeRunner_TimeoutException $e) {
    assert('$e->getMessage() == "code execution timed out"');
    assert('$e->getCause() === $caller');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===