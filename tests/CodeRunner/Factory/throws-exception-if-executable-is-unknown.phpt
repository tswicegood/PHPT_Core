--TEST--
If the executable is unknown (such as a bad one passed in via the Registry), a
PHPT_Case_VetoException will be thrown
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class PHPT_SimpleTestCase extends PHPT_Case
{
    public $sections = null;
    public function __construct() {
        $this->sections = new PHPT_SectionList();
    }
    public function __destruct() { }
    
    public function is($name) {
        return $name == "CgiRequired";
    }
}

$case = new PHPT_SimpleTestCase();

PHPT_Registry::getInstance()->cgi_executable = '/path/to/some/unknown/php';

$factory = new PHPT_CodeRunner_Factory();

try {
    $factory->factory($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    assert('$e->getMessage() == "unable to locate PHP executable: /path/to/some/unknown/php"');
}

?>
===DONE===
--EXPECT--
===DONE===
