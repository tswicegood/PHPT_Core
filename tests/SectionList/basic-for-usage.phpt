--TEST--
Data that it is instantiated with can be iterated over via foreach()
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$array = array(
    'ENV' => new Domain51_Test_Section_Env(''),
    'INI' => new Domain51_Test_Section_Ini(''),
    'SKIPIF' => new Domain51_Test_Section_Skipif(''),
);

$list = new Domain51_Test_SectionList($array);

for ($list->rewind(); $list->valid(); $list->next()) {
    $value = $list->current();
    $key = $list->key();
    assert('$value instanceof Domain51_Test_Section');
    assert('$value == $array[$key]');
}
    

?>
===DONE===
--EXPECT--
===DONE===