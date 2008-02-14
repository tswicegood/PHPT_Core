--TEST--
After Case::run() is called, its result property is an instance of CodeRunner_Result
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_FILE(''),
    )),
    dirname(__FILE__) . '/fake-test.phpt'
);

$case->run(new PHPT_Reporter_Null());

assert('$case->result instanceof PHPT_CodeRunner_Result');

?>
===DONE===
--EXPECT--
===DONE===

