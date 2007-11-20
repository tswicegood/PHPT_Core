--TEST--
output of onStartStart()
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onSuiteStart(new PHPT_SimpleSuite());

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f%s

===DONE===
