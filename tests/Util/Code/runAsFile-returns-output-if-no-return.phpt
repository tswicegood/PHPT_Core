--TEST--
If $code outputs data the output is returned
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$code = 'echo realpath(__FILE__);';

$util = new PHPT_Util_Code($code);

$file = dirname(__FILE__) . PATH_SEPARATOR . 'foobar.php';
$result = $util->runAsFile($file);

assert('$result == $file');

?>
===DONE===
--CLEAN--
<?php 
if (file_exists(dirname(__FILE__) . '/foobar.php')) {
    unlink(dirname(__FILE__) . '/foobar.php');
}
?>
--EXPECT--
===DONE===

