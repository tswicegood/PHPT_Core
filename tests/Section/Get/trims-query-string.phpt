--TEST--
The query string will have any leading and trailing whitespace trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new Domain51_Test_Section_Env();
$get_data = "  trims two spaces from left and tab from right\t";
$get = new Domain51_Test_Section_Get($get_data);
$get->modifyEnv($env);
assert('$env->data["QUERY_STRING"] == "trims two spaces from left and tab from right"');

?>
===DONE===
--EXPECT--
===DONE===