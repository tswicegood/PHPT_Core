<?php

class PHPT_Case_Collector
{
    public function __construct()
    {
        
    }
    
    public function collect($path)
    {
        $case_files = array();
        
        $dir = scandir($path);
        foreach ($dir as $file) {
            if (substr($file, -5) == '.phpt') {
                $case_files[] = "{$path}/{$file}";
            }
        }
        return new PHPT_CaseList($case_files);
    }
}