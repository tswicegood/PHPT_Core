--TEST--
PHPT_SectionList::filterByInterface() filterByInterfaces the data based on the interface name
passed in.  The full interface is "PHPT_Section_<$interface>".
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$runnable = array(
    'ENV' => new PHPT_Section_ENV(''),
    'CLEAN' => new PHPT_Section_CLEAN(''),
);

$non_runnable = array(
    'INI' => new PHPT_Section_INI(''),
);

$data = array_merge($runnable, $non_runnable);
$list = new PHPT_SectionList($data);
$list->filterByInterface('Runnable');
assert('$list->valid()');
$list->filterByInterface('EnvModifier');
assert('$list->valid() == false');

?>
===DONE===
--EXPECT--
===DONE===
