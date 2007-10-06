--TEST--
A custom content type can be set if the following string is on one of the lines within
the section's data:

    Content-Type: foo-bar
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$content_type = "random-content " . rand(100, 200);
$post_data = <<<END
Content-Type: {$content_type}
END;

$post = new PHPT_Section_Postraw($post_data);
$env = new PHPT_Section_Env();

$post->modifyEnv($env, new PHPT_SimpleTestCase());
assert('$env->data["CONTENT_TYPE"] == $content_type');

?>
===DONE===
--EXPECT--
===DONE===
