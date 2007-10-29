--TEST--
If the provided Case has an INI section, is() returns false
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_INI('foo=bar'),
    )),
    dirname(__FILE__) . '/foobar.phpt'
);

$validator = new PHPT_Case_Validator_OutputBufferCompatible();
assert('$validator->is($case) === false');

?>
===DONE===
--EXPECT--
===DONE===