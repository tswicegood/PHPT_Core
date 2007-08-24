--TEST--
Domain51_Test_Util_ValueDumper can dump an array in as a single-line
string.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Util/ValueDumper.php';

$dumper = new Domain51_Test_Util_ValueDumper(array());
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(array(123, 321));
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(array('zero' => 123, 'one' => 'tres dos uno'));
echo $dumper, "\n";

?>
===DONE===
--EXPECT--
array()
array(0 => 123, 1 => 321)
array('zero' => 123, 'one' => 'tres dos uno')
===DONE===