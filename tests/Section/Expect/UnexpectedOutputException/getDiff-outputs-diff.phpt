--TEST--
When a PHPT_Section_Expect_UnexpectedOutputException::getDiff() is called, the
diff is returned
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$exception = new PHPT_Section_Expect_UnexpectedOutputException("one", "two");
echo $exception->getDiff(), "\n";

?>
===DONE===
--EXPECT--
001- one
001+ two
===DONE===
