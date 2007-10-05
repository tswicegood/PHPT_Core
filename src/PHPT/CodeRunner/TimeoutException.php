<?php

class PHPT_CodeRunner_TimeoutException extends Exception
{
    private $_runner = null;
    
    public function __construct(PHPT_CodeRunner $runner)
    {
        $this->_runner = $runner;
        parent::__construct('code execution timed out');
    }
    
    public function getCause()
    {
        return $this->_runner;
    }
}
