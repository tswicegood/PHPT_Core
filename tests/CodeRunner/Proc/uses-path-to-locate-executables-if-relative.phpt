--TEST--
If the runner's $executable is relative, then use the PHPT_Registry->path value
to find it.

* @todo make work on Windows
--SKIPIF--
<?php if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') echo 'skip - test not compatible with Windows yet'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
// PHPT_Registry->path will default to dirname($_ENV['_']) which is the dirname of the
// php executable that is executing the test
$runner->executable = 'php';
$runner->validate();

PHPT_Registry::getInstance()->path = '/some/path/that/does/not/exist';
$runner->executable = 'php';
try {
    $runner->validate();
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_InvalidExecutableException $e) {
    assert('$e->getMessage() == "unable to locate PHP executable: php"');
}

?>
===DONE===
--EXPECT--
===DONE===
