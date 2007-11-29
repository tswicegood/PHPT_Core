--TEST--
Code executed by the CodeRunner_Driver_WScriptShell is executed in its own process
--SKIPIF--
<?php
if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') {
    echo 'skip - only applicable in Windows';
}
?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(100, 200);
$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php var_dump($this) ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
$result = $runner->run($filename);

echo $result->output, "\n";

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECTREGEX--
.*(Undefined variable: this.|NULL)*
===DONE===
