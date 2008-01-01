--TEST--
Requires a string - i.e., (string)$actual == $actual - for $actual parameter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid_actual_values = array(
    'a valid string',
    123,
    123.321,
);

foreach ($valid_actual_values as $valid_actual) {
    new PHPT_Util_Diff('foobar', $valid_actual);
}

$invalid_actual_values = array(
    new StdClass(),
    array(),
);

foreach ($invalid_actual_values as $invalid_actual) {
    try {
        new PHPT_Util_Diff('foobar', $invalid_actual);
        trigger_error('exception not caught: ' . $invalid_actual);
    } catch (PHPT_Util_Diff_InvalidParameter $e) {
        assert('$e->getMessage() == "provided \$actual value is not a valid string"');
    }
}
?>
===DONE===
--EXPECT--
===DONE===


