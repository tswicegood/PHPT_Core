--TEST--
Domain51_Test_CodeRunner decorates the real runner, i.e., the Domain51_Test_CodeRunner_$name
object
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class Domain51_Test_CodeRunner_Foobar
{
    public function __set($key, $value) {
        echo "__set({$key}, {$value})\n";
    }
    
    public function __get($key) {
        echo "__get({$key})\n";
    }
    
    public function run($filename) {
        echo __METHOD__ . ' called with ' . $filename, "\n";
    }
}

$runner = new Domain51_Test_CodeRunner('Foobar');
$runner->foo = 'bar';
$foo = $runner->foo;
$runner->run('foobar.php');

?>
===DONE===
--EXPECT--
__set(foo, bar)
__get(foo)
Domain51_Test_CodeRunner_Foobar::run called with foobar.php
===DONE===