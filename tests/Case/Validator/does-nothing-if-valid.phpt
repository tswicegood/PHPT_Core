--TEST--
If Domain51_Test_Case_Validator::validate() provided a valid nothing happens
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$file = new Domain51_Test_Section_File('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.php';

$case = new Domain51_Test_Case(
    new Domain51_Test_SectionList(array(
        $file,
        new Domain51_Test_Section_Test('foobar'),
    ))
);

$validator = new Domain51_Test_Case_Validator();
$validator->validate($case);

?>
===DONE===
--EXPECT--
===DONE===