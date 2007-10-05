<?php

abstract class PHPT_Section_ExpectationAbstract implements PHPT_Section_RunAfter
{
    protected $_expected = null;
    private $_exception = 'PHPT_Section_%s_UnexpectedOutputException';
    
    public function __construct($data)
    {
        $this->_expected = $data;
        $exploded = explode('_', get_class($this));
        $this->_exception = sprintf($this->_exception, array_pop($exploded));
    }
    
    public function run(PHPT_Case $case)
    {
        if (!$this->_isValid($case)) {
            $this->_storeExpFile($case->filename);
            throw new $this->_exception(
                $this->_expected,
                $case->output
            );
        }

    }
    
    abstract protected function _isValid(PHPT_Case $case);
    
    protected function _storeExpFile($filename)
    {
        $exp_filename = dirname($filename) . '/' . basename($filename, '.php') . '.exp';
        file_put_contents($exp_filename, $this->_expected);
    }
}
