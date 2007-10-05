--TEST--
PHPT_Util_Diff can be cast to a string to show the differences between
two strings passed into it.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = rand(100, 200);
$one = "First Line {$random}\n" .
       "Second Line";
$two = "Uno Line\n" .
       "Second Line\n" .
       "Third Only In Actual";

$diff = new PHPT_Util_Diff($one, $two);
echo $diff, "\n";

?>
===DONE===
--EXPECTF--
001- First Line %d
001+ Uno Line
003+ Third Only In Actual
===DONE===
