--TEST--
Domain51_Test_SectionList::filter() filters the data based on the interface name
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
$list->filter('Runnable');

foreach ($list as $key => $value) {
    assert('$runnable[$key] == $value');
}

?>
===DONE===
--EXPECT--
===DONE===