--TEST--
PHPT_Case->result is null when instantiated
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$case = new PHPT_Case(
    new PHPT_SectionList(array()),
    dirname(__FILE__) . '/fake-test.phpt'
);
assert('is_null($case->result)');

?>
===DONE===
--EXPECT--
===DONE===


