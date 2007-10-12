--TEST--
If Case->sections contains any CgiElement objects, validate() will do nothing
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

interface PHPT_Section_CgiExecutable extends PHPT_Section { }
class FoobarSection implements PHPT_Section_CgiExecutable { }

$case = new PHPT_Case(new PHPT_SectionList(array(new FoobarSection())));
$validator = new PHPT_Case_Validator_CgiRequired();
$validator->validate($case);

?>
===DONE===
--EXPECT--
===DONE===
