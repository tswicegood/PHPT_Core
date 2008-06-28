--TEST--
When PHPT_Section_ARGS is cast to a string, its data is represented
with a leading " -- "
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

echo new PHPT_Section_ARGS('--foo=bar --random=' . rand(100, 200)), PHP_EOL;


?>
===DONE===
--EXPECTREGEX--
 -- --foo=bar --random=[0-9]{3}
===DONE===
