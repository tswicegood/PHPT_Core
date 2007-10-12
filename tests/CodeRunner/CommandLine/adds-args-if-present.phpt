--TEST--
If the CodeRunner has a non-empty $args property, its value is added added to the
generated string string
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$runner = new FoobarCodeRunner();
$args = '-f --int ' . rand(100, 200);
$runner->args = new PHPT_Section_Args($args);

$command = new PHPT_CodeRunner_CommandLine($runner);
echo $command, "\n";

$expected = 'php -f ' . dirname(__FILE__) . '/fake-test-case.php -- ' . $args;
assert('$command == $expected');

?>
===DONE===
--EXPECTREGEX--
php -f \/([^ ]+)\/fake-test-case.php -- -f --int [12][0-9]{2}
===DONE===
