--TEST--
If the runner's $executable is relative, then use the environments PATH value
to find it.

* @todo make work on Windows
* @todo determine a better way set default PATH
--SKIPIF--
<?php if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') echo 'skip - test not compatible with Windows yet'; ?>
--ENV--
PATH=/usr/bin:/usr/local/bin
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Proc($caller);
// assume "php" is located in the path
$runner->executable = 'php';
$runner->validate();

$runner->executable = 'php-does-not-exist';
try {
    $runner->validate();
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_InvalidExecutableException $e) {
    assert('$e->getMessage() == "unable to locate PHP executable: php-does-not-exist"');
}

?>
===DONE===
--EXPECT--
===DONE===