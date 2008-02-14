<?php

class PHPT_Section_RETURNS implements PHPT_Section_RunnableAfter
{
    public function __construct($data = null)
    {
        $this->_expected = $data;
    }

    public function run(PHPT_Case $case)
    {
        if ($case->result->exitcode != $this->_expected) {
            throw new PHPT_Section_RETURNS_ExitCodeMismatch($case, $this->_expected, $case->result->exitcode);
        }
    }

    public function getPriority()
    {

    }
}

class PHPT_Section_RETURNS_ExitCodeMismatch extends PHPT_Case_FailureException
{
    private $_actual = null;
    private $_expected = null;

    public function __construct(PHPT_Case $case, $expected, $actual)
    {
        parent::__construct($case, 'exit code mismatch');
        $this->_expected = $expected;
        $this->_actual = $actual;
    }

    public function getReason()
    {
        return "expected {$this->_expected}, received {$this->_actual}";
    }
}
