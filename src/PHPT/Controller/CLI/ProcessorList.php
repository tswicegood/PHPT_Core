<?php

class PHPT_Controller_CLI_ProcessorList implements Countable
{
    private $_list = array();

    public function __construct()
    {
        $this->_loadAllProcessors();
    }

    private function _loadAllProcessors()
    {
        $this->_loadAllProcessorFiles();
        $this->_loadAllProcessorClasses();
    }

    private function _loadAllProcessorFiles()
    {
        $iterator = new PHPT_Util_PatternFilterIterator(
            new DirectoryIterator(dirname(__FILE__) . '/Processors'),
            '/.*Processor.php$/'
        );
        foreach ($iterator as $file) {
            include_once $file->getRealPath();
        }
    }

    private function _loadAllProcessorClasses()
    {
        $classes = get_declared_classes();
        foreach ($classes as $class) {
            $reflection = new ReflectionClass($class);
            if (!$reflection->implementsInterface('PHPT_Controller_CLI_Processor')) {
                continue;
            }
            $this->_list[] = new $class();
        }
    }

    public function toArray()
    {
        return $this->_list;
    }

    public function count()
    {
        return count($this->_list);
    }
}

class PHPT_Util_PatternFilterIterator extends FilterIterator
{
    private $_pattern;
    public function __construct(Iterator $iterator, $pattern)
    {
        $this->_pattern = $pattern;
        parent::__construct($iterator);
    }

    public function accept()
    {
        return $this->getInnerIterator()->isFile() == true 
               && preg_match($this->_pattern, $this->getInnerIterator()->getFileName());
    }
}

