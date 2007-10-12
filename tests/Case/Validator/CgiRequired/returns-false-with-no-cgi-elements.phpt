--TEST--
If no Section objects in Case->sections implement PHPT_Section_CgiExecutable, is()
returns false
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_Case(new PHPT_SectionList());
$validator = new PHPT_Case_Validator_CgiRequired();
assert('$validator->is($case) == false');

?>
===DONE===
--EXPECT--
===DONE===
