--TEST--
Domain51_Test_Util_ValueDumper can dump resources in the following format:
"resource"
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Util/ValueDumper.php';

$fp = fopen(dirname(__FILE__) . '/temporary.file', 'w');
echo new Domain51_Test_Util_ValueDumper($fp), "\n";
?>
===DONE===
--CLEAN--
<?php unlink(dirname(__FILE__) . '/temporary.file'); ?>
--EXPECT--
resource
===DONE===