--TEST--
The returned PHPT_CodeRunner has its $post_filename property set based on the
Test_Case's sections->POSTRAW->file value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
PHPT_Registry::getInstance()->path = dirname(__FILE__) . '/../../../tests-supporting/bin';


class FoobarTestCase extends PHPT_Case
{
    public $sections = null;
    
    public function __construct() {
        $post = new PHPT_Section_POSTRAW('foo=bar');
        $post->file = 'foobar.php';
        $this->sections = new PHPT_SectionList(array(
            $post,
        ));
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
