<?php

class Domain51_Test_Case
{
    public $name = 'This is a sample test case to show that "Hello World" can be echoed';
    public $filename = '';
    public $leave_file = false;
    
    public function __construct($name, $filename, $code, $sections)
    {
        $this->name = $name;
        $this->filename = $filename;
        $this->code = $code;
        $this->sections = $sections;
        
        $this->update();
    }
    
    public function __destruct()
    {
        if ($this->leave_file == false) {
            unlink($this->filename);
        }
    }
    
    public function update()
    {
        file_put_contents($this->filename, $this->code);
    }
}