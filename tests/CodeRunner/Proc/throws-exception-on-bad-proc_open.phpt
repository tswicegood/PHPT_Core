--TEST--
If proc_open() does not generate a resource, a Domain51_Test_CodeRunner_Proc_ExecutionException
is thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Hello World!"; ?>';
file_put_contents($filename, $code);

$caller = new Domain51_Test_CodeRunner();
$runner = new Domain51_Test_CodeRunner_Proc($caller);
$runner->command_line = '/some/unknown/and/bad/path/to/php';
try {
    $runner->run($filename);
    trigger_error('exception not caught');
} catch (Domain51_Test_CodeRunner_ExecutionException $e) {
    assert('preg_match("/\/some\/unknown\/and\/bad\/path\/to\/php/", $e->getMessage())');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===