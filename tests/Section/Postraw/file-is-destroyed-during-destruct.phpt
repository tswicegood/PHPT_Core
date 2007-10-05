--TEST--
When a PHPT_Section_Postraw object is destroyed after the $file is
created, __destruct() will remove the file.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$post_data = <<<END
msg=Hello+World
END;

$case = new PHPT_SimpleTestCase();
$post = new PHPT_Section_Postraw($post_data);
$post->run($case);
$filename = $post->file;

unset($post);
assert('!file_exists($filename)');

?>
===DONE===
--EXPECT--
===DONE===
