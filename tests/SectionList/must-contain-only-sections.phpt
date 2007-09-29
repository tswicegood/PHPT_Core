--TEST--
If the $sections array contains somthing besides an object that implements a
Domain51_Test_Section, it throws a Domain51_Test_SectionList_InvalidParameter exception
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$array = array(123);
try {
    new Domain51_Test_SectionList($array);
    trigger_error('exception not caught');
} catch (Domain51_Test_SectionList_InvalidParameter $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===