<?php

class PHPT_CodeRunner_CommandLine
{
    private $_executable = 'php';
    private $_filename = null;
    private $_ini = '';
    private $_args = '';
    private $_post_filename = '';
    
    public function __construct(PHPT_CodeRunner_Abstract $runner)
    {
        $this->_filename = $runner->filename;
        $this->_ini = (string)$runner->ini;
        $this->_args = (string)$runner->args;
        $this->_executable = (string)$runner->executable;
        $this->_post_filename = (string)$runner->post_filename;
    }
    
    public function __toString()
    {
        $command = $this->_executable;
        if (!empty($this->_ini)) {
            $command .= ' ' . trim($this->_ini);
        }
        $command .= ' -f ' . $this->_filename;
        if (!empty($this->_args)) {
            $command .= ' ' . trim($this->_args);
        }
        if (!empty($this->_post_filename)) {
            $command .= ' 2>&1 < ' . $this->_post_filename;
        }
        return $command;
    }
}