<?php

class Domain51_Test_Section_Expect extends Domain51_Test_Section_ExpectationAbstract
{
    protected function _isValid(Domain51_Test_Case $case)
    {
        return strcmp($case->output, $this->_expected) == 0;
    }
}