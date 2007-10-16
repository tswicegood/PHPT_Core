--TEST--
--INI--
variables_order=E
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

class PHPT_SimpleCodeRunnerDriver extends PHPT_CodeRunner_Driver_Abstract {
    public function run($filename) { }
    public function validate() { }
}

$runner = new PHPT_SimpleCodeRunnerDriver(new PHPT_CodeRunner());
assert('$runner->environment == $_ENV');

?>
===DONE===
--EXPECT--
===DONE===