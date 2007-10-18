--TEST--
When a PHPT_Section_Expectf_UnexpectedOutputException::getDiff() is called, the
diff is returned
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';
$exception = new PHPT_Section_Expectf_UnexpectedOutputException($case, "one");
echo $exception->getDiff(), "\n";

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
001- one
001+ two
===DONE===
