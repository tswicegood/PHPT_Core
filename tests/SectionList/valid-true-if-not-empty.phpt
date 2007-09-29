--TEST--
If SectionList is instantiated with a non-empty array, valid() will be true
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    'ENV' => new Domain51_Test_Section_Env(''),
);

$list = new Domain51_Test_SectionList($data);
assert('$list->valid() == true');

?>
===DONE===
--EXPECT--
===DONE===