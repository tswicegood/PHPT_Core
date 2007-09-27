<?php

/**
 * @todo this needs to be updated to current PHP standards instead of this original
 *       values set forth from PEAR_RunTests
 */
class Domain51_Test_Section_Expectf extends Domain51_Test_Section_ExpectationAbstract
{
    private $_real_pattern = '';
    
    public function __construct($data)
    {
        parent::__construct($data);
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
    
    protected function _isValid(Domain51_Test_Case $case)
    {
        return preg_match($this->_real_pattern, $case->output);
    }
}