--TEST--
If the $sections array contains somthing besides an object that implements a
PHPT_Section, it throws a PHPT_SectionList_InvalidParameter exception
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$array = array(123);
try {
    new PHPT_SectionList($array);
    trigger_error('exception not caught');
} catch (PHPT_SectionList_InvalidParameter $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===
