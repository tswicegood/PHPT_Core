<?php

class FoobarCodeRunner extends PHPT_CodeRunner_Abstract
{
    public $filename = '';
    public $ini = '';
    public $args = null;
    
    public function __construct()
    {
        $this->filename = dirname(__FILE__) . '/fake-test-case.php';
    }
    
    public function run($filename) { }
}