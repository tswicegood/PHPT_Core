--TEST--
PHPT_Util_ValueDumper can dump an object in the form of
a string formatted as:
"object: <class_name>"
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class ASimpleClass { }

$dumper = new PHPT_Util_ValueDumper(new ASimpleClass());
echo $dumper, "\n";

?>
===DONE===
--EXPECT--
object: ASimpleClass
===DONE===
