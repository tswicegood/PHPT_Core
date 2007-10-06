--TEST--
If any Section objects within Case->sections implement PHPT_Section_CgiExecutable, is()
returns true
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

class FoobarSection implements PHPT_Section_CgiExecutable { }

$case = new PHPT_Case(new PHPT_SectionList(array(new FoobarSection())));
$validator = new PHPT_Case_Validator_CgiRequired();
assert('$validator->is($case) == true');

?>
===DONE===
--EXPECT--
===DONE===