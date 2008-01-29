--TEST--
If proc_open() does not generate a resource, a PHPT_CodeRunner_Driver_Proc_ExecutionException
is thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Hello World!"; ?>';
file_put_contents($filename, $code);

$some_invalid_executable = '/some/unknown/and/bad/path/to/php';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->executable = $some_invalid_executable;

try {
    $runner->run($filename);
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_ExecutionException $e) {
    assert('$e->getExecutable() == $some_invalid_executable');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
