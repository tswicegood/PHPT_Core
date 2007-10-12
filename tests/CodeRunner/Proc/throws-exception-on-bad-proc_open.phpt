--TEST--
If proc_open() does not generate a resource, a PHPT_CodeRunner_Driver_Proc_ExecutionException
is thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php echo "Hello World!"; ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->executable = '/some/unknown/and/bad/path/to/php';
try {
    $runner->run($filename);
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_ExecutionException $e) {
    assert('preg_match("/\/some\/unknown\/and\/bad\/path\/to\/php/", $e->getMessage())');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
