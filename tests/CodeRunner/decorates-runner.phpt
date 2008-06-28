--TEST--
PHPT_CodeRunner decorates the real runner, i.e., the PHPT_CodeRunner_Driver_$name
object
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class PHPT_CodeRunner_Driver_Foobar
{
    public function __set($key, $value) {
        echo "__set({$key}, {$value})" . PHP_EOL;
    }
    
    public function __get($key) {
        echo "__get({$key})" . PHP_EOL;
    }
    
    public function run($filename) {
        echo __METHOD__ . ' called with ' . $filename, PHP_EOL;
    }
}

$runner = new PHPT_CodeRunner('Foobar');
$runner->foo = 'bar';
$foo = $runner->foo;
$runner->run('foobar.php');

?>
===DONE===
--EXPECT--
__set(foo, bar)
__get(foo)
PHPT_CodeRunner_Driver_Foobar::run called with foobar.php
===DONE===
