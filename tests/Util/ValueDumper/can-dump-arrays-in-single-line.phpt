--TEST--
PHPT_Util_ValueDumper can dump an array in as a single-line
string.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$dumper = new PHPT_Util_ValueDumper(array());
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(array(123, 321));
echo $dumper, "\n";

$dumper = new PHPT_Util_ValueDumper(array('zero' => 123, 'one' => 'tres dos uno'));
echo $dumper, "\n";

echo new PHPT_Util_ValueDumper(
    array(
        123,
        array(
            234,
            432
        ),
    )
), "\n";

?>
===DONE===
--EXPECT--
array()
array(0 => 123, 1 => 321)
array('zero' => 123, 'one' => 'tres dos uno')
array(0 => 123, 1 => array(0 => 234, 1 => 432))
===DONE===
