--TEST--
If a Case answers is('CgiRequired') and Registry->cgi_executable is set, use that value
instead of the default "php".
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
PHPT_Registry::getInstance()->path = dirname(__FILE__) . '/../../../tests-supporting/bin';

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

$executable = 'foobar-executable-' . rand(100, 200);
touch(PHPT_Registry::getInstance()->path . '/' . $executable);
chmod(PHPT_Registry::getInstance()->path . '/' . $executable, 0777);

PHPT_Registry::getInstance()->cgi_executable = $executable;

$factory = new PHPT_CodeRunner_Factory();
$runner = $factory->factory($case);

assert('$runner->executable == $executable');

?>
===DONE===
--CLEAN--
<?php
$dir = dirname(__FILE__) . '/../../../tests-supporting/bin';
foreach (scandir($dir) as $file) {
    if (preg_match('/foobar-executable-[12][0-9]{2}/', $file)) {
        unlink($dir . '/' . $file);
    }
}
?>    
--EXPECT--
===DONE===
