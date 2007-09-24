--TEST--
Can take a basic ini format and parse it into an associative array
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$random = rand(100, 200);

$ini_data = <<<END
message=Hello World
random={$random}
END;

$ini = new Domain51_Test_Section_Ini($ini_data);
assert('$ini->data["message"] == "Hello World"');
assert('$ini->data["random"] == $random');

?>
===DONE===
--EXPECT--
===DONE===