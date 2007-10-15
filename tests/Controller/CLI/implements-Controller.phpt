--TEST--
PHPT_Controller_CLI implements PHPT_Controller
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$controller = new PHPT_Controller_CLI();
assert('$controller instanceof PHPT_Controller');

?>
===DONE===
--EXPECT--
===DONE===
