<?php

abstract class PHPT_CodeRunner_Driver_Abstract
{
    protected $_caller = null;
    
    public $executable = 'php';
    public $environment = array();
    public $timeout = 60;
    public $ini = null;
    public $stdin = null;
    public $args = null;
    public $filename = null;
    public $post_filename = null;
    
    public function __construct(PHPT_CodeRunner $caller)
    {
        $this->_caller = $caller;
        if (!empty($_ENV)) {
            $this->environment = $_ENV;
        } else {
            $this->environment['PATH'] = getenv('PATH');
        }
        if (isset(PHPT_Registry::getInstance()->php)) {
            $this->executable = PHPT_Registry::getInstance()->php;
        }
    }
    
    abstract public function run($filename);
    
    abstract public function validate();
}
