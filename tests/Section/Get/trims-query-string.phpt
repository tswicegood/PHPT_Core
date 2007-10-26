--TEST--
The query string will have any leading and trailing whitespace trimmed
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new PHPT_Section_ENV();
$get_data = "  trims two spaces from left and tab from right\t";
$get = new PHPT_Section_GET($get_data);
$get->modifyEnv($env);
assert('$env->data["QUERY_STRING"] == "trims two spaces from left and tab from right"');

?>
===DONE===
--EXPECT--
===DONE===
