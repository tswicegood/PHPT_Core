--TEST--
The term "Content-Type:" must be the first characters in the line in order to
trigger setting a custom content-type.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_data = ' Content-Type: not set';
$env = new PHPT_Section_ENV();
$post = new PHPT_Section_POSTRAW($post_data);
$post->modifyEnv($env);
echo $env->data['CONTENT_TYPE'], PHP_EOL;

?>
===DONE===
--EXPECT--
application/x-www-form-urlencoded
===DONE===
