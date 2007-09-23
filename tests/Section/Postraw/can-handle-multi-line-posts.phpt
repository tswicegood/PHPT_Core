--TEST--
Can properly maintain multiple line posts
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';
$post_data = <<<END
line1=foo
line2=bar
END;

$post = new Domain51_Test_Section_Postraw($post_data);
$case = new Domain51_Test_SimpleTestCase();
$post->run($case);

assert('filesize($post->file) == strlen($post_data)');

?>
===DONE===
--EXPECT--
===DONE===