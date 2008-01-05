--TEST--
If neither PHPT_Registry->opts['help'] nor PHPT_Registry->opts['h'] are
present, do nothing
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../../_setup.inc';

$cli = new PHPT_Controller_CLI();
$help = new PHPT_Controller_CLI_Processors_HelpProcessor();
$help->process($cli);

?>
===DONE===
--EXPECT--
===DONE===

