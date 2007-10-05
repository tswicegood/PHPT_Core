--TEST--
Domain51_Test_Util_ValueDumper can dump resources in the following format:
"resource"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
echo new Domain51_Test_Util_ValueDumper($fp), "\n";
?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
resource
===DONE===