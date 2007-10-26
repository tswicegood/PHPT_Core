--TEST--
Will set the Section_ENV::$data["REQUEST_METHOD"] to "GET"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new PHPT_Section_ENV();
$get = new PHPT_Section_GET('');
$get->modifyEnv($env);

assert('$env->data["REQUEST_METHOD"] == "GET"');

?>
===DONE===
--EXPECT--
===DONE===
