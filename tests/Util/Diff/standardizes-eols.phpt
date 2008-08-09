--TEST--
All \n and \r\n markers are standardized to whatever PHP_EOL is
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$wanted = "foo\r\nbar\r\n";
$actual = "foo\nbar\n";

assert('(string)new PHPT_Util_Diff($wanted, $actual) === ""');

?>
===DONE===
--EXPECT--
===DONE===


