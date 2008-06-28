--TEST--
Should have '###+ data' for each line that is only present in $actual
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$actual = "some text";

echo new PHPT_Util_Diff('', $actual), PHP_EOL;

?>
===DONE===
--EXPECT--
001+ some text
===DONE===
