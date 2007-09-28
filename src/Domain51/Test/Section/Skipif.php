<?php

class Domain51_Test_Section_Skipif implements Domain51_Test_Section, Domain51_Test_Section_Runnable
{
    private $_data = null;
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function run(Domain51_Test_Case $case)
    {
        // @todo refactor this code into Domain51_Test_Util class as its used in multiple places
        $filename = dirname($case->filename) . '/' . basename($case->filename, '.php') . '.skip.php';
        
        // @todo refactor to Domain51_Test_CodeRunner
        file_put_contents($filename, $this->_data);
        $response = array();
        exec('php -f ' . $filename, $response);
        $response = implode("\n", $response);
        unlink($filename);
        
        if (preg_match('/^skip/', $response)) {
            throw new Domain51_Test_Case_VetoException();
        }
    }
}