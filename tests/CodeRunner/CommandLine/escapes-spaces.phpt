--TEST--
If runner->executable has spaces in it, they will be escaped
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-coderunner.inc';

$runner = new FooBarCodeRunner();
$runner->executable = '/some/path/with spaces/in it/php';

echo new PHPT_CodeRunner_CommandLine($runner), "\n";

?>
===DONE===
--EXPECTF--
/some/path/with\ spaces/in\ it/php%s

