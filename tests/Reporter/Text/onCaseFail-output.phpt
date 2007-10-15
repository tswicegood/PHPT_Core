--TEST--
onCaseFail() outputs a single F
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onCaseFail(new PHPT_SimpleTestCase(), new PHPT_SimpleFailureException());
echo "\n";

?>
===DONE===
--EXPECT--
F
===DONE===
