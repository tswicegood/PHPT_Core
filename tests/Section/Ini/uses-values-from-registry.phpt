--TEST--
If Registry->opts['ini'] is available, it will be used in this in the 
section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

PHPT_Registry::getInstance()->opts = array(
    'ini' => 'foo=bar',
);

$ini = new PHPT_Section_INI('');
assert('preg_match("/-d \"foo=bar\"/", (string)$ini)');

?>
===DONE===
--EXPECT--
===DONE===

