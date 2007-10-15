<?php

class PHPT_Suite_Factory
{
    public function __construct()
    {
        
    }
    
    public function collect($path, $recursive = false)
    {
        return new PHPT_Suite($this->_locateFiles($path, $recursive));
    }
    
    
    /**
     * @todo refactor collection/recursion through directory into a generic PatternCollector
     */
    private function _locateFiles($path, $recursive = false)
    {
        $return = array();
        
        $dir = scandir($path);
        foreach ($dir as $file) {
            if (substr($file, 0, 1) == '.') {
                continue;
            }
            $full_file = "{$path}/{$file}";
            if ($recursive && is_dir($full_file)) {
                $return = array_merge($return, $this->_locateFiles($full_file, $recursive));
            } elseif (substr($file, -5) == '.phpt') {
                $return[] = "{$path}/{$file}";
            }
        }
        return $return;
    }
}
