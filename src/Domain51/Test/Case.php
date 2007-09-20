<?php

class Domain51_Test_Case
{
    public $name = 'This is a sample test case to show that "Hello World" can be echoed';
    public $filename = '';
    public function __construct($name, $sections)
    {
        $this->filename = $sections['filename'];
    }
}