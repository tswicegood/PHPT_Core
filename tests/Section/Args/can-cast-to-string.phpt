--TEST--
When PHPT_Section_Args is cast to a string, its data is represented
with a leading " -- "
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

echo new PHPT_Section_Args('--foo=bar --random=' . rand(100, 200)), "\n";


?>
===DONE===
--EXPECTREGEX--
 -- --foo=bar --random=[0-9]{3}
===DONE===
