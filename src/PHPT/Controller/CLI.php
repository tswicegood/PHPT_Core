<?php

class PHPT_Controller_CLI implements PHPT_Controller
{
    private $_recursive = false;
    private $_reporter = null;

    public function __construct()
    {
        
    }
    
    public function __set($key, $value)
    {
        switch ($key) {
            case 'recursive' :
                $this->_recursive = $value;
                break;
            case 'reporter' :
                // @todo make sure this implements PHPT_Reporter
                $this->_reporter = $value;
                break;
        }
    }

    public function run(array $options = array())
    {
        $phpt = array_shift($options);
        if (basename($phpt) != 'phpt' && !is_null($phpt)) {
            // put it back on if it isn't "phpt"
            array_unshift($options, $phpt);
        }
        
        $path = array_pop($options);
        if (!is_file($path) && !is_dir($path)) {
            $options[] = $path;
            $path = getcwd();
        }
        
        $opt_parser = new PHPT_Util_CLI_OptParser();
        $opt_parser->parse($options);

        $this->_runProcessors();
        $suite = $this->_suiteFactory($path);
        $suite->run($this->_reporter);
    }

    private function _runProcessors()
    {
        $list = new PHPT_Controller_CLI_ProcessorList();
        array_map(array($this, 'acceptProcessor'), $list->toArray());
    }

    private function _suiteFactory($path)
    {
        if (is_dir($path)) {
            $factory = new PHPT_Suite_Factory();
            $suite = $factory->factory($path, $this->_recursive);
        } else {
            $suite = new PHPT_Suite(array($path));
        }
        return $suite;
    }

    public function acceptProcessor(PHPT_Controller_CLI_Processor $processor)
    {
        $processor->process($this);
    }
}

