--TEST--
PHPT_Section_INI always uses exposes these minimum settings.

NOTE:  This is the current default of PEAR_RunTest and may be subject to change
prior the first stable release of PHPT.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$ini = new PHPT_Section_INI();
$expected = array(
    'output_handler' => '',
    'open_basedir' => '',
    'safe_mode' => '0',
    'disable_functions' => '',
    'output_buffering' => 'Off',
    'display_errors' => '1',
    'log_errors' => '0',
    'html_errors' => '0',
    'track_errors' => '1',
    'report_memleaks' => '0',
    'report_zend_debug' => '0',
    'docref_root' => '',
    'docref_ext' => '.html',
    'error_prepend_string' => '',
    'error_append_string' => '',
    'auto_prepend_file' => '',
    'auto_append_file' => '',
    'magic_quotes_runtime' => '0',
    'xdebug.default_enable' => '0',
    'allow_url_fopen' => '1',
);

assert('$ini->data == $expected');

?>
===DONE===
--EXPECT--
===DONE===
