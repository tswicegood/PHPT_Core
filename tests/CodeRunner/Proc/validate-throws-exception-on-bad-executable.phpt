--TEST--
If the $executable property is not set to a valid executable, validate() will throw
a CodeRunner_InvalidExecutableException
@todo make work on Windows
--SKIPIF--
<?php if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') echo 'skip - test not compatible with Windows yet'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->executable = '/some/unknown/path/to/php';
try {
    $runner->validate();
    trigger_error('did someone really put "php" in /some/unknown/path/to?');
} catch (PHPT_CodeRunner_InvalidExecutableException $e) {
    assert('$e->getMessage() == "unable to locate PHP executable: /some/unknown/path/to/php"');
}
?>
===DONE===
--EXPECT--
===DONE===
