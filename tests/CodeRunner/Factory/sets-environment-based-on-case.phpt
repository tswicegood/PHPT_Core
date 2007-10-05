--TEST--
The returned PHPT_CodeRunner has its $environment property set based on the
Test_Case's sections->ENV->data value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-sections.inc';

class FoobarTestCase extends PHPT_Case
{
    public $sections = null;
    
    public function __construct() {
        $this->sections = new FoobarSections();
        $this->sections->ENV = new StdClass();
        $this->sections->ENV->data = array(
            'random' => rand(100, 200),
        );
    }
}

$case = new FoobarTestCase();

$runner = PHPT_CodeRunner_Factory::factory($case);
assert('$runner->environment == $case->sections->ENV->data');

?>
===DONE===
--EXPECT--
===DONE===
