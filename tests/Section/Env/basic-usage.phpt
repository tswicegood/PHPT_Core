--TEST--
Domain51_Section_Env handles the ENV block.  It parses key/value pairs from
the block, each line being a new pair, and makes those values available
via the data property.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

// setup - insure that $_ENV is empty
$_ENV = array();

$random = rand(100, 200);

$env_data = <<<END
foo=bar
random={$random}
has=extra=equals=signs
trims=this line and the next final blank line here    

END;

$env = new Domain51_Test_Section_Env($env_data);
$expected = array(
    'foo' => 'bar',
    'random' => $random,
    'has' => 'extra=equals=signs',
    'trims' => 'this line and the next final blank line here',
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