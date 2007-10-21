<?php

class PHPT_Section_Clean implements PHPT_Section_RunnableAfter
{
    public $filename = null;
    public $output = '';
    private $_data = null;
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function __destruct()
    {
        @unlink($this->filename);
    }
    
    // @todo add test to make sure Clean::run() actually executes code
    public function run(PHPT_Case $case)
    {
        $this->filename = substr($case->filename, 0, -4) . '.clean.php';
        file_put_contents($this->filename, $this->_data);
        
        // @todo refactor into a PHPT_CodeRunner_Factory::forClean()
        $runner = new PHPT_CodeRunner();
        $result = $runner->run($this->filename);
        $this->output = $result->output;
    }
}
