--TEST--
If $stdin property is not null, it will be cast to string prior to being passed in
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$code = '<?php
$fp = fopen("php://stdin", "r");
echo fread($fp, 8192);
fclose($fp);
?>';
file_put_contents($filename, $code);

class FoobarStdin {
    private $message = '';
    public function __construct() {
        $this->message = 'Some Random Int Passed Through STDIN: ' . rand(100, 200);
    }
    public function __toString() {
        return $this->message;
    }
}

$message = new FoobarStdin();

$caller = new Domain51_Test_CodeRunner();
$runner = new Domain51_Test_CodeRunner_Proc($caller);
$runner->stdin = $message;
$result = $runner->run($filename);

assert('$result->output == (string)$message');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===