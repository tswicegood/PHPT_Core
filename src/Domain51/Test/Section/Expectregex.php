<?php

class Domain51_Test_Section_Expectregex extends Domain51_Test_Section_ExpectationAbstract
{
    protected function _isValid(Domain51_Test_Case $case)
    {
        return preg_match($this->_expected, $case->output);
    }
}