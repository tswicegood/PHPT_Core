<?php

class PHPT_Case_FailureException extends Exception
{
    public function __construct(PHPT_Case $case, $reason)
    {
        parent::__construct($reason);
    }
    
    public function getReason()
    {
        return $this->getMessage();
    }
}
