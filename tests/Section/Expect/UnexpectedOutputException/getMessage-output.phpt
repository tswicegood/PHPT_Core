--TEST--
getMessage() returns "output does not match EXPECT section"
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';
$exception = new PHPT_Section_EXPECT_UnexpectedOutputException($case, 'bar');
echo $exception->getMessage(), PHP_EOL;

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
output does not match EXPECT section
===DONE===
