--TEST--
The validate() method will call validate() on the runner
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class PHPT_CodeRunner_Foobar {
    public function validate() {
        echo __METHOD__, " was called\n";
    }
}

$runner = new PHPT_CodeRunner('Foobar');
$runner->validate();

?>
===DONE===
--EXPECT--
PHPT_CodeRunner_Foobar::validate was called
===DONE===