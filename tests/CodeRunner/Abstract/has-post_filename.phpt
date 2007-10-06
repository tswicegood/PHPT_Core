--TEST--
Has a public $post_filename property which ''should'' equal a file within the filesystem
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$reflection = new ReflectionClass('PHPT_CodeRunner_Abstract');
assert('$reflection->hasProperty("post_filename")');
assert('$reflection->getProperty("post_filename")->isPublic()');

?>
===DONE===
--EXPECT--
===DONE===