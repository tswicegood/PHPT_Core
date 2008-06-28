--TEST--
The $timeout property allows you to set how long you want to wait for the
running code to completely execute.
--SKIPIF--
<?php require dirname(__FILE__) . '/_skipif.inc'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(1, 2);
$filename = dirname(__FILE__) . '/foobar.php';
$code = "<?php sleep(" . ($random + 1) . "); echo 'Hello...', PHP_EOL; ?>";
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner('WScriptShell');
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
$runner->timeout = $random;
try {
    $r = $runner->run($filename);
    var_dump($r);
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_TimeoutException $e) {
    assert('$e->getMessage() == "code execution timed out"');
    assert('$e->getCause() === $caller');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
