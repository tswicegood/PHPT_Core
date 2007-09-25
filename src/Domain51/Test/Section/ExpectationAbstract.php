<?php

abstract class Domain51_Test_Section_ExpectationAbstract implements Domain51_Test_Section_Runnable
{
    protected $_expected = null;
    
    public function __construct($data)
    {
        $this->_expected = $data;
    }
    
    public function run(Domain51_Test_Case $case)
    {
        if (!$this->_isValid($case)) {
            $this->_storeExpFile($case->filename);
            throw new Domain51_Test_Section_Expect_UnexpectedOutputException(
                $this->_expected,
                $case->output
            );
        }

    }
    
    abstract protected function _isValid(Domain51_Test_Case $case);
    
    protected function _storeExpFile($filename)
    {
        $exp_filename = dirname($filename) . '/' . basename($filename, '.php') . '.exp';
        file_put_contents($exp_filename, $this->_expected);
    }
}