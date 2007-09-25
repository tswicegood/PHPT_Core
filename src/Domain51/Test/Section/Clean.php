<?php

class Domain51_Test_Section_Clean implements Domain51_Test_Section
{
    public $filename = null;
    private $_data = null;
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function __destruct()
    {
        @unlink($this->filename);
    }
    
    public function run(Domain51_Test_Case $case)
    {
        $this->filename = substr($case->filename, 0, -4) . '.clean.php';
        file_put_contents($this->filename, $this->_data);
    }
}