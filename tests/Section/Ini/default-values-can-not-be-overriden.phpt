--TEST--
The default ini values can not be overriden
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$ini_data = '';
$default_ini = new PHPT_Section_INI();
$default_ini->run(new PHPT_SimpleTestCase());

foreach ($default_ini->data as $key => $value) {
    if (!empty($ini_data)) {
        $ini_data .= PHP_EOL;
    }
    $ini_data .= "{$key}=foo";
}
// sanity check to make sure we have as many lines as there are default keys
assert('count($default_ini->data) == count(explode(PHP_EOL, $ini_data))');

$ini = new PHPT_Section_INI($ini_data);
$ini->run(new PHPT_SimpleTestCase());

assert('$ini->data == $default_ini->data');

?>
===DONE===
--EXPECT--
===DONE===
