--TEST--
PHPT_Section_POSTRAW::$file is always unique
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_data =<<<END
msg=Hello+World
END;

$one = new PHPT_Section_POSTRAW($post_data);
$two = new PHPT_Section_POSTRAW($post_data);
assert('$one->file != $two->file');

?>
===DONE===
--EXPECT--
===DONE===
