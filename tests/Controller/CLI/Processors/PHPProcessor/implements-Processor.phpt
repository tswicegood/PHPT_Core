--TEST--
PHPT_Controller_CLI_Processors_PHPProcessor implements PHPT_Controller_CLI_Processor
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Controller_CLI_Processors_PHPProcessor');
assert('$reflection->implementsInterface("PHPT_Controller_CLI_Processor")');

?>
===DONE===
--EXPECT--
===DONE===


