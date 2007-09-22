--TEST--
Domain51_Test_Section_Env can be instantiated without any parameters
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$env = new Domain51_Test_Section_Env();
$expected = array(
    'REDIRECT_STATUS' => '',
    'QUERY_STRING' => '',
    'PATH_TRANSLATED' => '',
    'SCRIPT_FILENAME' => '',
    'REQUEST_METHOD' => '',
    'CONTENT_TYPE' => '',
    'CONTENT_LENGTH' => '',
    'HTTP_COOKIE' => '',
);
assert('$env->data == $expected');

?>
===DONE===
--EXPECT--
===DONE===