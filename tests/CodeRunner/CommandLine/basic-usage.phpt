--TEST--
In basic usage, PHPT_CodeRunner_CommandLine will represent command to execute
the PHP sapi using "-f" and the filename of the PHPT_CodeRunner.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$random = rand(100, 200);
$runner = new FoobarCodeRunner();
$runner->filename .= $random;

$string = (string)new PHPT_CodeRunner_CommandLine($runner);
echo $string, "\n";

$expected = 'php -f ' . dirname(__FILE__) . '/fake-test-case.php' . $random;
assert('$string == $expected');

?>
===DONE===
--EXPECTREGEX--
php -f \/([^ ]+)\/fake-test-case.php[12][0-9]{2}
===DONE===