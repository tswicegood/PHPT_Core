--TEST--
Requires a string - i.e., (string)$wanted == $wanted - for $wanted parameter
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$valid_wanted_values = array(
    'a valid string',
    123,
    123.321,
);

foreach ($valid_wanted_values as $valid_wanted) {
    new PHPT_Util_Diff($valid_wanted, 'foobar');
}

$invalid_wanted_values = array(
    new StdClass(),
    array(),
);

foreach ($invalid_wanted_values as $invalid_wanted) {
    try {
        new PHPT_Util_Diff($invalid_wanted, 'foobar');
        trigger_error('exception not caught: ' . $invalid_wanted);
    } catch (PHPT_Util_Diff_InvalidParameter $e) {
        assert('$e->getMessage() == "provided \$wanted value is not a valid string"');
    }
}
?>
===DONE===
--EXPECT--
===DONE===

