--TEST--
getMessage() returns "output does not match EXPECTREGEX section"
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$exception = new PHPT_Section_Expectregex_UnexpectedOutputException(new PHPT_SimpleTestCase(), 'bar');
echo $exception->getMessage(), "\n";

?>
===DONE===
--EXPECT--
output does not match EXPECTREGEX section
===DONE===