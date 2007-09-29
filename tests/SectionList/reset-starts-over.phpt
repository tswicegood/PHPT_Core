--TEST--
Calling SectionList::rewind() restarts the iterator at the beginning
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new Domain51_Test_SectionList(array(
    'ENV' => new Domain51_Test_Section_Env(''),
));


assert('$list->valid() == true');

foreach ($list as $v) {
    // do nothing
}

assert('$list->valid() == false');
$list->rewind();
assert('$list->valid() == true');

?>
===DONE===
--EXPECT--
===DONE===