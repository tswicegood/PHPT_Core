<?php

class Domain51_Test_Section_Expect implements Domain51_Test_Section
{
    private $_expected = null;
    
    public function __construct($data)
    {
        $this->_expected = $data;
    }
    
    public function run(Domain51_Test_Case $case)
    {
        if (strcmp($case->output, $this->_expected)) {
            throw new Domain51_Test_Section_Expect_UnexpectedOutputException(
                $this->_expected,
                $case->output
            );
        }
    }
}