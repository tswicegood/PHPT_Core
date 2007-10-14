<?php

abstract class PHPT_Case_FailureException extends Exception
{
    public function __construct(PHPT_Case $case, $reason)
    {
        parent::__construct($reason);
    }
    
    abstract public function getDiff();
}