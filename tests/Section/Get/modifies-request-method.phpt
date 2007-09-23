--TEST--
Will set the Section_Env::$data["REQUEST_METHOD"] to "GET"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new Domain51_Test_Section_Env();
$get = new Domain51_Test_Section_Get('');
$get->modifyEnv($env);

assert('$env->data["REQUEST_METHOD"] == "GET"');

?>
===DONE===
--EXPECT--
===DONE===