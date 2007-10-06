--TEST--
The query string will have any leading and trailing whitespace trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$env = new PHPT_Section_Env();
$get_data = "  trims two spaces from left and tab from right\t";
$get = new PHPT_Section_Get($get_data);
$get->modifyEnv($env, new PHPT_SimpleTestCase());
assert('$env->data["QUERY_STRING"] == "trims two spaces from left and tab from right"');

?>
===DONE===
--EXPECT--
===DONE===
