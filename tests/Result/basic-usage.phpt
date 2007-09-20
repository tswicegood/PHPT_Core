--TEST--
Domain51_Test_Result takes an array of results (generally from a
ResultReader) and wraps them so they can be iterated across
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$array = array(
    array(
        'test' => 'assertTrue',
        'status' => 'pass',
        'message' => 'a true assertion passed',
    ),
    array(
        'test' => 'assertFalse',
        'status' => 'fail',
        'message' => 'a false assertion failed',
    ),
);

$result = new Domain51_Test_Result($array);
assert('$result->current() == $array[0]');
assert('$result->valid() == true');
$result->next();
assert('$result->valid() == true');
assert('$result->current() == $array[1]');
$result->next();
assert('$result->valid() == false');
$result->rewind();
assert('$result->valid() == true');

for ($result->rewind(); $result->valid(); $result->next()) {
    assert('$array[$result->key()] == $result->current()');
}

?>
===DONE===
--EXPECT--
===DONE===