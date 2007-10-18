--TEST--
When a PHPT_Section_Expect_UnexpectedOutputException::getDiff() is called, the
diff is returned
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$exception = new PHPT_Section_Expect_UnexpectedOutputException(new PHPT_SimpleTestCase(), "one");
echo $exception->getDiff(), "\n";

?>
===DONE===
--CLEAN--
<?php $path = dirname(__FILE__); include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
001- one
001+ two
===DONE===
