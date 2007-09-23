--TEST--
If no data or an empty string is passed into Section_Postraw, no file parameter is
created.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post = new Domain51_Test_Section_Postraw('');
assert('empty($post->file)');

$post = new Domain51_Test_Section_Postraw();
assert('empty($post->file)');

?>
===DONE===
--EXPECT--
===DONE===