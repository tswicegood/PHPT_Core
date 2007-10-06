--TEST--
The term "Content-Type:" must be the first characters in the line in order to
trigger setting a custom content-type.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$post_data = <<<END
 Content-Type: not set
END;
$env = new PHPT_Section_Env();
$post = new PHPT_Section_Postraw($post_data);
$post->modifyEnv($env, new PHPT_SimpleTestCase());
assert('$env->data["CONTENT_TYPE"] != "not set"');

?>
===DONE===
--EXPECT--
===DONE===
