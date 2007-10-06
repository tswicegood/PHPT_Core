--TEST--
Will set the Section_Env::$data["REQUEST_METHOD"] to "GET"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$env = new PHPT_Section_Env();
$get = new PHPT_Section_Get('');
$get->modifyEnv($env, new PHPT_SimpleTestCase());

assert('$env->data["REQUEST_METHOD"] == "GET"');

?>
===DONE===
--EXPECT--
===DONE===
