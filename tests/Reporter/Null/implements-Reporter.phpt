--TEST--
PHPT_Reporter_Null implements PHPT_Reporter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

assert('new PHPT_Reporter_Null() instanceof PHPT_Reporter');

?>
===DONE===
--EXPECT--
===DONE===