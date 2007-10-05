--TEST--
PHPT_Section_Post::$file is created during run with the contents that
the object was instantiated with
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_simple-test-case.inc';

$post_data = <<<END
a[0]=1&a[1]=2
END;

$case = new PHPT_SimpleTestCase();
$post = new PHPT_Section_Post($post_data);

assert('!empty($post->file)');
assert('!file_exists($post->file)');
$post->run($case);
assert('file_exists($post->file)');

assert('trim(file_get_contents($post->file)) == trim($post_data)');

?>
===DONE===
--EXPECT--
===DONE===
