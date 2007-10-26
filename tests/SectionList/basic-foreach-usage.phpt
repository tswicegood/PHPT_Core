--TEST--
Data that it is instantiated with can be iterated over via foreach()
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$array = array(
    'ENV' => new PHPT_Section_ENV(''),
    'INI' => new PHPT_Section_INI(''),
    'SKIPIF' => new PHPT_Section_SKIPIF(''),
);

$list = new PHPT_SectionList($array);

foreach ($list as $key => $value) {
    assert('$value instanceof PHPT_Section');
    assert('$value == $array[$key]');
}
    

?>
===DONE===
--EXPECT--
===DONE===
