--TEST--
When a PHPT_Section_Expectf_UnexpectedOutputException is cast to
a string, shows a diff of the two values it was handed in.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$exception = new PHPT_Section_Expectf_UnexpectedOutputException("one", "two");
echo $exception, "\n";

?>
===DONE===
--EXPECT--
001- one
001+ two
===DONE===
