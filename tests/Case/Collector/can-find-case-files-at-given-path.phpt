--TEST--
Returns CaseList containing the various Cases located there
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$test_path = realpath(dirname(__FILE__) . '/../../../tests-supporting/tests');

$collector = new PHPT_Case_Collector($test_path);
$collection = $collector->collect($test_path);

assert('$collection instanceof PHPT_CaseList');
assert('count($collection) == 2');

foreach ($collection as $case) {
    // sanity check
    assert('$case instanceof PHPT_Case');
    
    // all tests should pass
    $case->run();
}

?>
===DONE===
--EXPECT--
===DONE===