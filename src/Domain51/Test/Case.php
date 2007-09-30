<?php

// @todo make all properties "read-only" (or as read-only as they can be in PHP)
class Domain51_Test_Case
{
    public $sections = null;
    public $output = null;
    
    public function __construct(Domain51_Test_SectionList $sections)
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
    
    public function update()
    {
        file_put_contents($this->filename, $this->code);
    }
    
    public function run()
    {
        // @todo refactor to call sections->FILE->run($this)s
        ob_start();
        include $this->sections->FILE->filename;
        $this->output = ob_get_clean();
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
}