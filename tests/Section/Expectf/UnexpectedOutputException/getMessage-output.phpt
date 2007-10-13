--TEST--
getMessage() returns "output does not match EXPECTF section"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$exception = new PHPT_Section_Expectf_UnexpectedOutputException('foo', 'bar');
echo $exception->getMessage(), "\n";

?>
===DONE===
--EXPECT--
output does not match EXPECTF section
===DONE===