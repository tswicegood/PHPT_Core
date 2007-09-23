--TEST--
The term "Content-Type:" must be the first characters in the line in order to
trigger setting a custom content-type.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_data = <<<END
 Content-Type: not set
END;
$env = new Domain51_Test_Section_Env();
$post = new Domain51_Test_Section_Postraw($post_data);
$post->modifyEnv($env);
assert('$env->data["CONTENT_TYPE"] != "not set"');

?>
===DONE===
--EXPECT--
===DONE===