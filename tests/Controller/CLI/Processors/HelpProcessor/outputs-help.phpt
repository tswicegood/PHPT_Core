--TEST--
If PHPT_Registry->opts['help'] is present, print out the help and exit
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../../_setup.inc';

PHPT_Registry::getInstance()->opts = array(
    'help' => true,
);

$cli = new PHPT_Controller_CLI();
$help = new PHPT_Controller_CLI_Processors_HelpProcessor();
$help->process($cli);

?>
This text should not be displayed - process() should have exited
--EXPECT--
PHPT v@@VERSION@@ usage:
  $ phpt [FILE]
  $ phpt [DIRECTORY]

  -h --help             Display this help text
  -r --recursive        When used with DIRECTORY, recursively scans
                        for .phpt files
  -q --quiet            Loads quiet version of reporter, if available
  --reporter Reporter   Use Reporter to handle out

