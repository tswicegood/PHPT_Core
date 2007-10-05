--TEST--
PHPT_Util_ValueDumper can dump simple values
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$dumper = new PHPT_Util_ValueDumper('Hello World!');
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper('ÁHola mundo!');
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(123);
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(123.321);
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(true);
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(false);
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(null);
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
