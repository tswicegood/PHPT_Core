--TEST--
If the provided Case answers yes to Case->is('CgiRequired'), the $executable property
will be set to 'php-cgi'
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
$factory = new PHPT_CodeRunner_Factory();

$runner = $factory->factory($case);
$expected = dirname(__FILE__) . '/../../support/bin/php-cgi';

if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    assert('$runner->executable == "php-cgi.exe"');
} else {
    assert('$runner->executable == "php-cgi"');
}

?>
===DONE===
--EXPECT--
===DONE===
