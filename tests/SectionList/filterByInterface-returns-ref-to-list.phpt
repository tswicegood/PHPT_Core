--TEST--
PHPT_SectionList::filterByInterface() returns a reference to the
list object so it can be chained.
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    'INI' => new PHPT_Section_Ini(''),
);

$list = new PHPT_SectionList($data);

assert('$list->filterByInterface("Runnable") instanceof PHPT_SectionList');

?>
===DONE===
--EXPECT--
===DONE===
