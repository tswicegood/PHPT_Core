<?php

/**
 * @todo this needs to be updated to current PHP standards instead of this original
 *       values set forth from PEAR_RunTests
 */
class Domain51_Test_Section_Expectf implements Domain51_Test_Section_Runnable
{
    private $_real_pattern = '';
    
    public function __construct($data)
    {
        $this->_pattern = $data;
        $this->_real_pattern = str_replace(
            array(
                '%i',
                '%s',
                '%d',
                '%f',
                '%x',
            ),
            array(
                '[+-]?[0-9]+',
                '.+',
                '[0-9]+',
                '[+\-]?\.?[0-9]+\.?[0-9]*(E-?[0-9]+)?',
                '[A-Fa-f0-9]+',
            ),
            "/{$data}/"
        );
    }
    
    public function run(Domain51_Test_Case $case)
    {
        if (!preg_match($this->_real_pattern, $case->output)) {
            throw new Domain51_Test_Section_Expectf_UnexpectedOutputException(
                $this->_pattern,
                $case->output
            );
        }
    }
}