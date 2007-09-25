--TEST--
Should have '###- data' for each line that is not present in $actual
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$one = "some text";

echo new Domain51_Test_Util_Diff($one, ''), "\n";

?>
===DONE===
--EXPECT--
001- some text
===DONE===