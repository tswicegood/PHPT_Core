--TEST--
If is() would translate to false, a PHPT_Case_VetoException would be thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$validator = new PHPT_Case_Validator_OutputBufferCompatible();

$filename = dirname(__FILE__) . '/foobar.phpt';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_INI('foo=bar'),
    )),
    $filename
);

try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    assert('$e->getMessage() == "unable to run in OutputBuffer mode with INI section present"');
}

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_ARGS('foo=bar'),
    )),
    $filename
);
try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    assert('$e->getMessage() == "unable to run in OutputBuffer mode with ARGS section present"');
}

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_ENV('foo=bar'),
    )),
    $filename
);
try {
    $validator->validate($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    assert('$e->getMessage() == "unable to run in OutputBuffer mode with ENV section present"');
}

?>
===DONE===
--EXPECT--
===DONE===