--TEST--
The default ini values can not be overriden
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini_data = '';
$default_ini = new PHPT_Section_Ini();
foreach ($default_ini->data as $key => $value) {
    if (!empty($ini_data)) {
        $ini_data .= "\n";
    }
    $ini_data .= "{$key}=foo";
}
// sanity check to make sure we have as many lines as there are default keys
assert('count($default_ini->data) == count(explode("\n", $ini_data))');

$ini = new PHPT_Section_Ini($ini_data);
assert('$ini->data == $default_ini->data');

?>
===DONE===
--EXPECT--
===DONE===
