--TEST--
getMessage() returns "output does not match EXPECTREGEX section"
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$exception = new PHPT_Section_Expectregex_UnexpectedOutputException(new PHPT_SimpleTestCase(), 'bar');
echo $exception->getMessage(), "\n";

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
output does not match EXPECTREGEX section
===DONE===
