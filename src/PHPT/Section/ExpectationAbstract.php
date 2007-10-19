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
            $case->leave_file = true;
            throw new $this->_exception(
                $case,
                $this->_expected
            );
        }
        
        $path = dirname($case->filename);
        $dir = scandir($path);
        
        // "foobar.php.*" is a match
        $base_file = basename($case->filename) . '.';
        foreach ($dir as $file) {
            if (strstr($file, $base_file) !== false) {
                unlink("{$path}/{$file}");
            }
        }
    }
    
    abstract protected function _isValid(PHPT_Case $case);
}
