--TEST--
PHPT_Case_Validator_Runnable::is() returns true if the provided $case is valid
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$file = new PHPT_Section_File('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        $file,
        new PHPT_Section_Test('foobar'),
    ))
);

$validator = new PHPT_Case_Validator_Runnable();
assert('$validator->is($case) == true');

?>
===DONE===
--EXPECT--
===DONE===
