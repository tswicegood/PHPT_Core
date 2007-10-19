<?php

abstract class PHPT_Section_ExpectationAbstract_UnexpectedOutputException
    extends PHPT_Case_FailureException
{
    protected $_wanted = null;
    protected $_actual = null;
    protected $_message = '';
    
    public function __construct(PHPT_Case $case, $expected)
    {
        $this->_wanted = $expected;
        $this->_actual = $case->output;
        
        file_put_contents(
            $case->filename . '.exp',
            $this->_wanted
        );
        
        file_put_contents(
            $case->filename . '.out',
            $case->output
        );
        
        file_put_contents(
            $case->filename . '.diff',
            $this->getDiff()
        );
        
        file_put_contents(
            $case->filename . '.log',
            $this->_getLog($case, $expected)
        );
        parent::__construct($case, $this->_message);
    }
    
    public function __toString()
    {
        return $this->getDiff();
    }
    
    public function getDiff()
    {
        return (string)new PHPT_Util_Diff($this->_wanted, $this->_actual);
    }
    
    private function _getLog(PHPT_Case $case, $expected)
    {
        return "---- EXPECTED OUTPUT\n"
            . $expected . "\n"
            . "---- ACTUAL OUTPUT\n"
            . $case->output . "\n"
            . "---- FAILED\n";
    }
}
