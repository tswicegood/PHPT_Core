--TEST--
When a Domain1_Test_Section_INI is cast to a string, the string is capable of
being used in a command-line.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini_data = "message=Hello World";
$ini = new PHPT_Section_INI($ini_data);
$expected = '-d "message=Hello World" '
    . '-d "output_handler=" '
    . '-d "open_basedir=" '
    . '-d "safe_mode=0" '
    . '-d "disable_functions=" '
    . '-d "output_buffering=Off" '
    . '-d "display_errors=1" '
    . '-d "log_errors=0" '
    . '-d "html_errors=0" '
    . '-d "track_errors=1" '
    . '-d "report_memleaks=0" '
    . '-d "report_zend_debug=0" '
    . '-d "docref_root=" '
    . '-d "docref_ext=.html" '
    . '-d "error_prepend_string=" '
    . '-d "error_append_string=" '
    . '-d "auto_prepend_file=" '
    . '-d "auto_append_file=" '
    . '-d "magic_quotes_runtime=0" '
    . '-d "xdebug.default_enable=0" '
    . '-d "allow_url_fopen=1"';
assert('(string)$ini == $expected');

?>
===DONE===
--EXPECT--
===DONE===
