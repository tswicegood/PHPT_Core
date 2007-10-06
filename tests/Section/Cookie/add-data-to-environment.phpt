--TEST--
When modifyEnv() is called, it adds its $data string representation to the
$env->data["HTTP_COOKIE"] variable.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$cookie_data = "Random #: " . rand(100, 200);
$cookie = new PHPT_Section_Cookie($cookie_data);
$env = new PHPT_Section_Env();
$cookie->modifyEnv($env, new PHPT_SimpleTestCase());

assert('$env->data["HTTP_COOKIE"] == $cookie_data');

?>
===DONE===
--EXPECT--
===DONE===
