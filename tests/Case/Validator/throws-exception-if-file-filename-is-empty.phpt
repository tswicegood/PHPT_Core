--TEST--
If the FILE->filename property is empty in the provide Case's sections property
a Domain51_Test_Exception_InvalidCaseException will be thrown.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$validator = new Domain51_Test_Case_Validator();
try {
    $validator->validate(
        new Domain51_Test_Case(
            new Domain51_Test_SectionList(array(
                new Domain51_Test_Section_Test('foobar'),
                new Domain51_Test_Section_File('foobar'),
            ))
        )
    );
    
    trigger_error('exception not caught');
} catch (Domain51_Test_Exception_InvalidCaseException $e) {
    assert('$e->getMessage() == "FILE section missing filename property"');
}

?>
===DONE===
--EXPECT--
===DONE===