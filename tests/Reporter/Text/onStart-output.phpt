--TEST--
output of onStart()
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onStart();

?>
===DONE===
--EXPECTF--
PHPT Test Runner v%f

===DONE===
