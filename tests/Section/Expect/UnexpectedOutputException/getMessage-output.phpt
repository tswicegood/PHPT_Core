--TEST--
getMessage() returns "output does not match EXPECT section"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$exception = new PHPT_Section_Expect_UnexpectedOutputException('foo', 'bar');
echo $exception->getMessage(), "\n";

?>
===DONE===
--EXPECT--
output does not match EXPECT section
===DONE===