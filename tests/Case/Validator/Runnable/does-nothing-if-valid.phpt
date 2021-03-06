--TEST--
If PHPT_Case_Validator_Runnable::validate() provided a valid nothing happens
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$file = new PHPT_Section_FILE('foobar');
$file->filename = dirname(__FILE__) . '/fake-test-case.phpt';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        $file,
        new PHPT_Section_TEST('foobar'),
    )),
    dirname(__FILE__) . '/fake-test-case.phpt'
);

$validator = new PHPT_Case_Validator_Runnable();
$validator->validate($case);

?>
===DONE===
--EXPECT--
===DONE===
