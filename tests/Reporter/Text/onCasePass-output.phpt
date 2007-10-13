--TEST--
onCasePass() outputs a single period (.)
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onCasePass(new PHPT_SimpleTestCase());
echo "\n";

?>
===DONE===
--EXPECT--
.
===DONE===