--TEST--
The returned PHPT_CodeRunner has its $ini property set based on the
Test_Case's (string)sections->INI value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
PHPT_Registry::getInstance()->path = dirname(__FILE__) . '/../../../tests-supporting/bin';

class FoobarTestCase extends PHPT_Case
{
    public $sections = null;
    
    public function __construct() {
        $this->sections = new PHPT_SectionList(array(
            new PHPT_Section_INI('foo=bar'),
        ));
    }
    
    public function __destruct() { }
}

$case = new FoobarTestCase();

$runner = PHPT_CodeRunner_Factory::factory($case);
assert('$runner->ini == (string)$case->sections->INI');

?>
===DONE===
--EXPECT--
===DONE===
