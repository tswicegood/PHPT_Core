<?php

abstract class PHPT_Section_ExpectationAbstract_UnexpectedOutputException
    extends PHPT_Case_FailureException
{
    protected $_wanted = null;
    protected $_actual = null;
    protected $_message = '';
    
    public function __construct(PHPT_Case $case, $expected)
    {
        $this->_case = $case;
        $this->_wanted = $expected;
        $this->_actual = $this->_case->output;

        $this->_createExpectationFile();
        $this->_createOutputFile();
        $this->_createDiffFile();
        $this->_createLogFile();

        parent::__construct($this->_case, $this->_message);
    }
    
    public function __toString()
    {
        return $this->getReason();
    }
    
    public function getReason()
    {
        return (string)new PHPT_Util_Diff($this->_wanted, $this->_actual);
    }
    
    

    protected function _createExpectationFile() {
        file_put_contents(
            $this->_case->filename . '.exp',
            $this->_wanted
        );
    }

    protected function _createOutputFile()
    {
        file_put_contents(
            $this->_case->filename . '.out',
            $this->_case->output
        );
    }

    protected function _createDiffFile()
    {
        file_put_contents(
            $this->_case->filename . '.diff',
            $this->getReason()
        );
    }

    protected function _createLogFile()
    {
        file_put_contents(
            $this->_case->filename . '.log',
            $this->_getLog($this->_case, $this->_wanted)
        );
    }

    /**
     * @todo refactor into own class
     */
    private function _getLog(PHPT_Case $case, $expected)
    {
        return "---- EXPECTED OUTPUT\n"
            . $expected . "\n"
            . "---- ACTUAL OUTPUT\n"
            . $this->_case->output . "\n"
            . "---- FAILED\n";
    }
}

