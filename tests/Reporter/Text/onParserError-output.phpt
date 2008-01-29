--TEST--
onParserError() outputs a single E
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Text();
$reporter->onParserError(new Exception);
echo "\n";

?>
===DONE===
--EXPECT--
E
===DONE===

