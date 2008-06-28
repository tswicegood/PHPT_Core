--TEST--
When a PHPT_Section_EXPECTF_UnexpectedOutputException::getReason() is called, the
diff is returned
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';
$exception = new PHPT_Section_EXPECTF_UnexpectedOutputException($case, "one");
echo $exception->getReason(), PHP_EOL;

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
001- one
001+ two
===DONE===
