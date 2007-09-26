<?php

class Domain51_Test_Section_Expectf implements Domain51_Test_Section_Runnable
{
    private $_pattern = '';
    
    public function __construct($data)
    {
        $this->_pattern = str_replace(
            array(
                '%i',
            ),
            array(
                '[+-]?[0-9]+',
            ),
            "/{$data}/"
        );
    }
    
    public function run(Domain51_Test_Case $case)
    {
        if (!preg_match($this->_pattern, $case->output)) {
            throw new Domain51_Test_Section_Expectf_UnexpectedOutputException();
        }
    }
}