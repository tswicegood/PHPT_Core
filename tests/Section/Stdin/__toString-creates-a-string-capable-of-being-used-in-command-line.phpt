--TEST--
When PHPT_Section_Stdin is cast to a string, it outputs the data it was
instantiated with.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$stdin_data = "some random data " . rand(100 ,200);
$stdin = new PHPT_Section_Stdin($stdin_data);
assert('(string)$stdin == $stdin_data');

?>
===DONE===
--EXPECT--
===DONE===
