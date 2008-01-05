--TEST--
If '--help' provided, displays help
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$opts = array('--help');
$cli = new PHPT_Controller_CLI();
$cli->run($opts);

?>
Should not finish executing...
--EXPECTREGEX--
/.*-h --help\s+Display this help text.*/

