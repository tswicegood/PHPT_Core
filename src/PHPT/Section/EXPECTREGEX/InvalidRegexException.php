<?php

class PHPT_Section_EXPECTREGEX_InvalidRegexException extends PHPT_Case_FailureException
{
    public function __construct(PHPT_Case $case, $pattern)
    {
        $error_info = error_get_last();
        $error = $error_info['message'];
        $error = substr($error, 14);
        $reason = 'invalid regex in EXPECTREGEX: ' . $error;
        parent::__construct($case, $reason);
    }
    
    public function getReason()
    {
        return '';
    }
}
