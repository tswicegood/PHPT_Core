--TEST--
Code executed by the CodeRunner_Driver_Proc is executed in its own process
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(100, 200);
$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php var_dump($this) ?>';
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$result = $runner->run($filename);

echo $result->output, "\n";

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECTREGEX--
.*(Undefined variable: this.|NULL)*
===DONE===
