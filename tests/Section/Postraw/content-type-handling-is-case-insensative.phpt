--TEST--
Content-Type handling is not case sensitive.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$content_type = "random-content " . rand(100, 200);
$post_data = <<<END
content-type: {$content_type}
END;

$post = new PHPT_Section_POSTRAW($post_data);
$env = new PHPT_Section_ENV();

$post->modifyEnv($env);
assert('$env->data["CONTENT_TYPE"] == $content_type');

?>
===DONE===
--EXPECT--
===DONE===
