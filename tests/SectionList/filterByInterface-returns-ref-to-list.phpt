--TEST--
Domain51_Test_SectionList::filterByInterface() returns a reference to the
list object so it can be chained.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    'INI' => new Domain51_Test_Section_Ini(''),
);

$list = new Domain51_Test_SectionList($data);

assert('$list->filterByInterface("Runnable") instanceof Domain51_Test_SectionList');

?>
===DONE===
--EXPECT--
===DONE===