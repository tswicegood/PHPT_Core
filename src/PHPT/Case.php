<?php

// @todo make all properties "read-only" (or as read-only as they can be in PHP)
class PHPT_Case
{
    public $sections = null;
    public $output = null;
    
    public function __construct(PHPT_SectionList $sections)
    {
        $this->sections = $sections;
    }
    
    public function __destruct()
    {
        foreach ($this->sections as $section) {
            if (method_exists($section, '__destruct')) {
                $section->__destruct();
            }
        }
    }
    
    public function run()
    {
        if ($this->sections->filterByInterface('RunBefore')->valid()) {
            foreach ($this->sections as $section) {
                $section->run($this);
            }
        }
        $this->sections->filterByInterface();
        $this->sections->FILE->run($this);
        if ($this->sections->filterByInterface('RunAfter')->valid()) {
            foreach ($this->sections as $section) {
                $section->run($this);
            }
        }
        $this->sections->filterByInterface();
    }
    
    public function __set($key, $value)
    {
        switch ($key) {
            case 'leave_file' :
                $this->sections->FILE->leave_file = $value;
                break;
            
            case 'code' :
                $this->sections->FILE->contents = $value;
                break;
        }
    }
    
    public function __get($key)
    {
        switch ($key) {
            case 'name' :
                return (string)$this->sections->TEST;
            
            case 'filename' :
                return (string)$this->sections->FILE->filename;
            
            case 'code' :
                return (string)$this->sections->FILE->contents;
        }
    }
    
    public function is($validator)
    {
        if (is_string($validator)) {
            $validator_name = "PHPT_Case_Validator_{$validator}";
            $validator = new $validator_name();
        }
        assert('$validator instanceof PHPT_Case_Validator || is_string($validator)');
        return $validator->is($this);
    }
}
