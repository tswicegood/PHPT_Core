<?php

class PHPT_Section_Expect extends PHPT_Section_ExpectationAbstract
{
    protected function _isValid(PHPT_Case $case)
    {
        return strcmp(rtrim($case->output), $this->_expected) == 0;
    }
}
