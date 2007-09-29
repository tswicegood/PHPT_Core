--TEST--
If you call filterByInterface() with null or no-value, the full dataset is restored
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

// sanity check
foreach ($list as $key => $value) {
    assert('$runnable[$key] == $value');
}

$list->filterByInterface();

foreach ($list as $key => $value) {
    assert('$data[$key] == $value');
}

?>
===DONE===
--EXPECT--
===DONE===