--TEST--
If the runner's $executable is relative, then use the PHPT_Registry->path value
to find it.
--SKIPIF--
<?php require dirname(__FILE__) . '/_skipif.inc'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
// PHPT_Registry->path will default to $_ENV['PATH']) or dirname($_ENV['_']) in the event PATH
// is not set
$runner->executable = 'php.exe';
$runner->validate();

PHPT_Registry::getInstance()->path = '/some/path/that/does/not/exist';
$runner->executable = 'php.exe';
try {
    $runner->validate();
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_InvalidExecutableException $e) {
    assert('$e->getMessage() == "unable to locate PHP executable: php.exe"');
}

?>
===DONE===
--EXPECT--
===DONE===
