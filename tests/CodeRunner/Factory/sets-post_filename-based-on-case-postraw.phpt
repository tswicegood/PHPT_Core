--TEST--
The returned PHPT_CodeRunner has its $post_filename property set based on the
Test_Case's sections->POSTRAW->file value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-sections.inc';

class FoobarTestCase extends PHPT_Case
{
    public $sections = null;
    
    public function __construct() {
        $this->sections = new FoobarSections();
        $this->sections->POSTRAW = new StdClass();
        $this->sections->POSTRAW->file = 'foobar.php';
    }
    
    public function __destruct() { }
}

$case = new FoobarTestCase();

$runner = PHPT_CodeRunner_Factory::factory($case);
assert('$runner->post_filename == (string)$case->sections->POSTRAW->file');

?>
===DONE===
--EXPECT--
===DONE===
