<?php

class PHPT_Section_Expectregex extends PHPT_Section_ExpectationAbstract
{
    protected function _isValid(PHPT_Case $case)
    {
        return preg_match($this->_expected, $case->output);
    }
}
