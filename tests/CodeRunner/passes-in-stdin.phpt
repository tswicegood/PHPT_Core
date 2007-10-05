--TEST--
If $stdin property is not null, its value is passed into the running process
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php
$fp = fopen("php://stdin", "r");
echo fread($fp, 8192);
fclose($fp);
?>';
file_put_contents($filename, $code);

$message = 'Some Random Int Passed Through STDIN: ' . rand(100, 200);
$runner = new PHPT_CodeRunner();
$runner->stdin = $message;
$result = $runner->run($filename);

assert('$result->output == $message');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
