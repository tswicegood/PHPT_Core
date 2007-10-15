--TEST--
Returns Suite containing the various Cases located there
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$test_path = realpath(dirname(__FILE__) . '/../../../tests-supporting/tests');

$collector = new PHPT_Suite_Factory($test_path);
$collection = $collector->collect($test_path);

assert('$collection instanceof PHPT_Suite');
assert('count($collection) == 2');

foreach ($collection as $case) {
    // sanity check
    assert('$case instanceof PHPT_Case');
    
    // all tests should pass
    $case->run(new PHPT_Reporter_Null());
}

?>
===DONE===
--EXPECT--
===DONE===
