--TEST--
PHPT_CaseList functions as a basic iterator 
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    dirname(__FILE__) . '/../_support/tests/hello-world.phpt',
    dirname(__FILE__) . '/../_support/tests/addition.phpt',
);

$list = new PHPT_CaseList($data);
assert('$list->valid()');

foreach ($list as $case) {
    assert('$case instanceof PHPT_Case');
}

assert('$list->valid() == false');
$list->rewind();
assert('$list->valid()');
$list->next();
assert('$list->valid()');
$list->next();
assert('$list->valid() == false');

$count = 0;
for ($list->rewind(); $list->valid(); $list->next()) {
    $count++;
    assert('$list->current() instanceof PHPT_Case');
}
assert('$count == 2');

?>
===DONE===
--EXPECT--
===DONE===