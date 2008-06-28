<?php

class PHPT_Section_EXPECTREGEX extends PHPT_Section_ExpectationAbstract
{
    protected function _isValid(PHPT_Case $case)
    {
        $pattern = $this->_expected;
        if (substr($pattern, -10) == '===DONE===') {
            $pattern = substr($pattern, 0, -10);
            $this->_checkForDoneToken($case);
        }
        if ($pattern[0] != '/') {
            $pattern = '/' . trim($pattern) . '/';
        } else {
            $pattern = trim($pattern);
        }
        
        // capture $matches - it'll still be NULL if $pattern was invalid
        $matches = null;
        $result = @preg_match($pattern, $case->output, $matches);
        if (is_null($matches)) {
            throw new PHPT_Section_EXPECTREGEX_InvalidRegexException($case, $pattern);
        }
        return $result;
    }

    private function _checkForDoneToken(PHPT_Case $case)
    {
        if (substr($case->output, -10) != '===DONE===') {
            throw new PHPT_Section_EXPECTREGEX_UnexpectedOutputException($case, $this->_expected);
        }
    }
}
