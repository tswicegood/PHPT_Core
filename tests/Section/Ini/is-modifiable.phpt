--TEST--
If the provided Case has any INIModifer sections, they will be called
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

class PHPT_SimpleIniModifier implements PHPT_Section_INIModifier
{
    public function modifyINI(PHPT_Section_INI $ini) {
        echo __METHOD__, " was called\n";
    }
}

$case = new PHPT_SimpleTestCase();
$case->sections = new PHPT_SectionList(array(
    new PHPT_SimpleIniModifier(),
));

$ini = new PHPT_Section_INI();
$ini->run($case);

?>
===DONE===
--EXPECT--
PHPT_SimpleIniModifier::modifyINI was called
===DONE===

