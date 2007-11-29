--TEST--
The returned PHPT_CodeRunner has its $post_filename property set based on the
Test_Case's sections->POST->file value.
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class FoobarTestCase extends PHPT_Case
{
    public $sections = null;
    
    public function __construct() {
        $post = new PHPT_Section_POST('foo=bar');
        $post->file = 'foobar.php';
        $this->sections = new PHPT_SectionList(array(
            $post,
        ));
    }
    
    public function __destruct() { }
}

$case = new FoobarTestCase();

$runner = PHPT_CodeRunner_Factory::factory($case);
assert('$runner->post_filename == (string)$case->sections->POST->file');

?>
===DONE===
--EXPECT--
===DONE===
