<?php

class PHPT_CodeRunner_ExecutionException extends Exception
{
    private $_executable = null;

    public function __construct($message, $executable) {
        parent::__construct($message);
        $this->_executable = $executable;
    }

    public function getExecutable() {
        return $this->_executable;
    }
}
