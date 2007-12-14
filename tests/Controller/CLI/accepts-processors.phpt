--TEST--
PHTP_Controller_CLI::acceptProcessor() will call process() on the provided processor
via a traditional Visitor pattern style double-callback.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class PHPT_SimpleControllerProcessor implements PHPT_Controller_CLI_Processor {
    public function process(PHPT_Controller_CLI $cli) {
        echo __METHOD__, " was called\n";
    }
}

$controller = new PHPT_Controller_CLI();
$controller->acceptProcessor(new PHPT_SimpleControllerProcessor());

?>
===DONE===
--EXPECT--
PHPT_SimpleControllerProcessor::process was called
===DONE===

