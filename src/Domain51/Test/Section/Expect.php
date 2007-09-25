<?php

class Domain51_Test_Section_Expect implements Domain51_Test_Section_Runnable
{
    private $_expected = null;
    
    public function __construct($data)
    {
        $this->_expected = $data;
    }
    
    public function run(Domain51_Test_Case $case)
    {
        if (strcmp($case->output, $this->_expected)) {
            $exp_filename = dirname($case->filename) . '/' . basename($case->filename, '.php') . '.exp';
            file_put_contents($exp_filename, $this->_expected);
            throw new Domain51_Test_Section_Expect_UnexpectedOutputException(
                $this->_expected,
                $case->output
            );
        }
    }
}