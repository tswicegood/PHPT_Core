--TEST--
Returns Suite containing the various Cases located there
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$test_path = realpath(dirname(__FILE__) . '/../../../tests-supporting/tests');

$factory = new PHPT_Suite_Factory($test_path);
$suite = $factory->factory($test_path);

assert('$suite instanceof PHPT_Suite');
assert('count($suite) == 2');

foreach ($suite as $case) {
    // sanity check
    assert('$case instanceof PHPT_Case');
    
    // all tests should pass
    $case->run(new PHPT_Reporter_Null());
}

?>
===DONE===
--EXPECT--
===DONE===
