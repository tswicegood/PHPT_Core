--TEST--
After runAsFile() is through, no files are left
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$raw_code = "return dirname(__FILE__);";

$code = new PHPT_Util_Code($raw_code);
$return = $code->runAsFile(dirname(__FILE__) . '/a-unique-filename.php');

assert('$return == dirname(__FILE__)');
assert('file_exists(dirname(__FILE__) . "/a-unique-filename.php") == false');

?>
===DONE===
--EXPECT--
===DONE===

