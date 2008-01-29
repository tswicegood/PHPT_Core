--TEST--
If a bad executable property is set, a PHPT_CodeRunner_Driver_ExecutionException
will be thrown

NOTE: This uses the StdErr channel to determine if something went wrong.  It
is the current assumption of the code that anything in that channel shouldn't
have occurred.  This may be revisited in future versions.
--SKIPIF--
<?php require dirname(__FILE__) . '/_skipif.inc'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Hello World!"; ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
$runner->executable = '/some/unknown/and/bad/path/to/php';
try {
    $result = $runner->run($filename);
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_ExecutionException $e) {
    
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
