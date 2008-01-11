--TEST--
PHPT_Section_ENV can be instantiated without any parameters and will have
a minimum of "default" values.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/foobar.phpt';

$env = new PHPT_Section_ENV();
$env->run($case);

$expected = array(
    'REDIRECT_STATUS' => '',
    'QUERY_STRING' => '',
    'PATH_TRANSLATED' => $case->filename,
    'SCRIPT_FILENAME' => $case->filename,
    'REQUEST_METHOD' => '',
    'CONTENT_TYPE' => '',
    'CONTENT_LENGTH' => '',
    'HTTP_COOKIE' => '',
);

foreach ($expected as $key => $value) {
    assert('isset($env->data[$key])');
    assert('$env->data[$key] == $value');
}

?>
===DONE===
--EXPECT--
===DONE===
