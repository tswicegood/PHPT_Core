--TEST--
PHPT_CodeRunner_CommandLine uses replaces its executable with the passed in
CodeRunner_Driver_Abstract's $executable property
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$runner = new FoobarCodeRunner();
$runner->executable = "/path/to/random/int/php-" . rand(100, 200);

$command = (string)new PHPT_CodeRunner_CommandLine($runner);

$expected = $runner->executable . ' -f ' . dirname(__FILE__) . '/fake-test-case.php';
assert('$command == $expected');

echo $command, PHP_EOL;

?>
===DONE===
--EXPECTREGEX--
\/path\/to\/random\/int\/php-[12][0-9]{2} -f ([^ ]+)\/fake-test-case.php
===DONE===
