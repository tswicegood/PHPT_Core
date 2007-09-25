--TEST--
When a Domain51_Test_Section_Expectregex_UnexpectedOutputException is cast to
a string, shows a diff of the two values it was handed in.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$exception = new Domain51_Test_Section_Expectregex_UnexpectedOutputException("one", "two");
echo $exception, "\n";

?>
===DONE===
--EXPECT--
001- one
001+ two
===DONE===