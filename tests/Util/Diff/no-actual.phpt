--TEST--
Should have '###- data' for each line that is not present in $actual
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$one = "some text";

echo new PHPT_Util_Diff($one, ''), PHP_EOL;

?>
===DONE===
--EXPECT--
001- some text
===DONE===
