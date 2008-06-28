--TEST--
If the CodeRunner has a non-empty $ini property, its value is added added to the
generated string string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$runner = new FoobarCodeRunner();
$runner->ini = " -d display_errors=" . rand(0, 1) . " ";

$command = new PHPT_CodeRunner_CommandLine($runner);
echo $command, PHP_EOL;

$expected = 'php ' . trim($runner->ini) . ' -f ' . dirname(__FILE__) . '/fake-test-case.php';
assert('$command == $expected');

?>
===DONE===
--EXPECTREGEX--
php -d display_errors=[01] -f ([^ ]+)\/fake-test-case.php
===DONE===
