--TEST--
Domain51_Test_Section_Postraw::$file is always unique
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_data =<<<END
msg=Hello+World
END;

$one = new Domain51_Test_Section_Postraw($post_data);
$two = new Domain51_Test_Section_Postraw($post_data);
assert('$one->file != $two->file');

?>
===DONE===
--EXPECT--
===DONE===