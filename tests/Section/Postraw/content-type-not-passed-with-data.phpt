--TEST--
The "Content-Type" line is not passed with data that is stored as post file
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_string = "msg=Hello+World";
$post_data = <<<END
Content-Type: foo-bar
{$post_string}
END;

$post = new PHPT_Section_Postraw($post_data);
assert('$post->raw_data == $post_string');

?>
===DONE===
--EXPECT--
===DONE===
