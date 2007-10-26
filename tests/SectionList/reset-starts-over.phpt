--TEST--
Calling SectionList::rewind() restarts the iterator at the beginning
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$list = new PHPT_SectionList(array(
    'ENV' => new PHPT_Section_ENV(''),
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
