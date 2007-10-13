--TEST--
onCaseStart() does not output anything
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onCaseStart(new PHPT_SimpleTestCase());

?>
===DONE===
--EXPECT--
===DONE===