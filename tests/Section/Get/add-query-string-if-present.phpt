--TEST--
PHPT_Section_Get, will modify the QUERY_STRING
Section_Env::$data["QUERY_STRING"] variable when modifyEnv() is called.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new PHPT_Section_Env();
$get_data = "message=Hello+World";
$get = new PHPT_Section_Get($get_data);
$get->modifyEnv($env);

assert('$env->data["QUERY_STRING"] == $get_data');

?>
===DONE===
--EXPECT--
===DONE===
