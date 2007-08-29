--TEST--
Domain51_Test_Util_ValueDumper can dump simple values
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Util/ValueDumper.php';

$dumper = new Domain51_Test_Util_ValueDumper('Hello World!');
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper('ÁHola mundo!');
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(123);
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(123.321);
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(true);
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(false);
echo $dumper, "\n";

$dumper = new Domain51_Test_Util_ValueDumper(null);
echo $dumper, "\n";

?>
===DONE===
--EXPECT--
'Hello World!'
'ÁHola mundo!'
123
123.321
true
false
NULL
===DONE===