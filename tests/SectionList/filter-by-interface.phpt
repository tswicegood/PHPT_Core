--TEST--
Domain51_Test_SectionList::filterByInterface() filterByInterfaces the data based on the interface name
passed in.  The full interface is "Domain51_Test_Section_<$interface>".
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$runnable = array(
    'ENV' => new Domain51_Test_Section_Env(''),
    'CLEAN' => new Domain51_Test_Section_Clean(''),
);

$non_runnable = array(
    'INI' => new Domain51_Test_Section_Ini(''),
);

$data = array_merge($runnable, $non_runnable);
$list = new Domain51_Test_SectionList($data);
$list->filterByInterface('Runnable');
assert('$list->valid()');
$list->filterByInterface('EnvModifier');
assert('$list->valid() == false');

?>
===DONE===
--EXPECT--
===DONE===