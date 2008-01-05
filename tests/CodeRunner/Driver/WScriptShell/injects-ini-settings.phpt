--TEST--
Takes the string value of $ini and injects it in the command line
--SKIPIF--
<?php require dirname(__FILE__) . '/_skipif.inc'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

class FoobarIni {
    public $display_errors = 1;

    public function __toString() {
        return " -d \"display_errors={$this->display_errors}\" ";
    }
}

// sanity check
$obj = new FoobarIni();
assert('(string)$obj == " -d display_errors=1 "');
$obj->display_errors = 0;
assert('(string)$obj == " -d display_errors=0 "');
unset($obj);


$filename = dirname(__FILE__) . '/foobar.php';
$code = "<?php echo ini_get('display_errors'); ?>";
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
// set with an object that can be cast to a string
$runner->ini = new FoobarIni();
$result = $runner->run($filename);
assert('$result->output == 1');

// set with a raw string
$runner->ini = ' -d display_errors=0 ';
$result = $runner->run($filename);
assert('$result->output == 0');

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
