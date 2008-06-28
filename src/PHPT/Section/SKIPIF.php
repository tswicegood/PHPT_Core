<?php

class PHPT_Section_SKIPIF implements PHPT_Section_RunnableBefore
{
    private $_data = null;
    
    public function __construct($data)
    {
        $this->_data = $data;
    }
    
    public function run(PHPT_Case $case)
    {
        // @todo refactor this code into PHPT_Util class as its used in multiple places
        $filename = dirname($case->filename) . '/' . basename($case->filename, '.php') . '.skip.php';
        
        // @todo refactor to PHPT_CodeRunner
        file_put_contents($filename, $this->_data);
        $response = array();
        exec('php -f ' . $filename, $response);
        $response = implode(PHP_EOL, $response);
        unlink($filename);
        
        if (preg_match('/^skip( - (.*))?/', $response, $matches)) {
            $message = !empty($matches[2]) ? $matches[2] : '';
            throw new PHPT_Case_VetoException($message);
        }
    }
    
    public function getPriority()
    {
        return 0;
    }
}
