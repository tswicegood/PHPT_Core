--TEST--
Domain51_Test_Util_ValueDumper can dump an object in the form of
a string formatted as:
"object: <class_name>"
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Util/ValueDumper.php';

class ASimpleClass { }

$dumper = new Domain51_Test_Util_ValueDumper(new ASimpleClass());
echo $dumper, "\n";

?>
===DONE===
--EXPECT--
object: ASimpleClass
===DONE===