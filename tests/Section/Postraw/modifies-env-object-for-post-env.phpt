--TEST--
When modifyEnv() is invoked, PHPT_Section_Postraw modifies the
supplied PHPT_Section_Env object to meet the expected environment
setup for a posted value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$post_data = <<<END
msg=Hello+World
END;

$post = new PHPT_Section_Postraw($post_data);
$env = new PHPT_Section_Env();

$post->modifyEnv($env, new PHPT_SimpleTestCase());
assert('$env->data["REQUEST_METHOD"] == "POST"');
assert('$env->data["CONTENT_TYPE"] == "application/x-www-form-urlencoded"');
assert('$env->data["CONTENT_LENGTH"] == strlen($post_data)');

?>
===DONE===
--EXPECT--
===DONE===
