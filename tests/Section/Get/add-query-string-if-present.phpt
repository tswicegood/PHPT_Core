--TEST--
PHPT_Section_GET, will modify the QUERY_STRING
Section_ENV::$data["QUERY_STRING"] variable when modifyEnv() is called.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new PHPT_Section_ENV();
$get_data = "message=Hello+World";
$get = new PHPT_Section_GET($get_data);
$get->modifyEnv($env);

assert('$env->data["QUERY_STRING"] == $get_data');

?>
===DONE===
--EXPECT--
===DONE===
