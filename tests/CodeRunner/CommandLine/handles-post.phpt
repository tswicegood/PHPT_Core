--TEST--
If CodeRunner_Driver_Abstract::$post_filename is not empty, the filename will be passed
into the PHP script being executed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$runner = new FoobarCodeRunner();
$runner->post_filename = dirname(__FILE__) . '/fake-post-file.php';

$command = (string)new PHPT_CodeRunner_CommandLine($runner);
echo $command, "\n";

$expected = 'php -f ' . dirname(__FILE__) . '/fake-test-case.php 2>&1 < ' . dirname(__FILE__) . '/fake-post-file.php';
assert('$command == $expected');

?>
===DONE===
--EXPECTREGEX--
php -f (\/|\\)([^ ]+)(\/|\\)fake-test-case.php 2>&1 < (\/|\\)([^ ]+)(\/|\\)fake-post-file.php
===DONE===
