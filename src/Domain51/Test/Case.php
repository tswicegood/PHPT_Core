<?php

class Domain51_Test_Case
{
    public $name = 'This is a sample test case to show that "Hello World" can be echoed';
    public $filename = '';
    public $leave_file = false;
    public $output = null;
    
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
    
    public function run()
    {
        // @todo refactor to use to-be-implemented Domain51_Test_CaseRunner 
        ob_start();
        include $this->filename;
        $this->output = ob_get_clean();
    }
}