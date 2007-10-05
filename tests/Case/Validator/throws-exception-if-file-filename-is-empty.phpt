--TEST--
If the FILE->filename property is empty in the provide Case's sections property
a PHPT_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$validator = new PHPT_Case_Validator();
try {
    $validator->validate(
        new PHPT_Case(
            new PHPT_SectionList(array(
                new PHPT_Section_Test('foobar'),
                new PHPT_Section_File('foobar'),
            ))
        )
    );
    
    trigger_error('exception not caught');
} catch (PHPT_Exception_InvalidCaseException $e) {
    assert('$e->getMessage() == "FILE section missing filename property"');
}

?>
===DONE===
--EXPECT--
===DONE===
