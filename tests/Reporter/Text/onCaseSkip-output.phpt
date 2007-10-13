--TEST--
onCaseSkip() outputs a single S
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onCaseSkip(new PHPT_SimpleTestCase(), new PHPT_Case_VetoException(''));
echo "\n";

?>
===DONE===
--EXPECT--
S
===DONE===