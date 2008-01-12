<?php

class PHPT_Util_CLI_OptParser
{
    public function __construct()
    {
        
    }
    
    public function parse(array $opts)
    {
        $encountered = null;
        $parsed_opts = array();
        foreach ($opts as $value) {
            if (is_file($value) || is_dir($value)) {
                continue;
            }
            if (!is_null($encountered)) {
                if ($value{0} != '-') {
                    $parsed_opts[$encountered] = $value;
                    $encountered = null;
                    continue;
                } else {
                    $parsed_opts[$encountered] = true;
                }
            }
            
            if (substr($value, 0, 2) == '--') {
                $encountered = substr($value, 2);
                continue;
            } else {
                $values = str_split(substr($value, 1));
                foreach ($values as $letter) {
                    $parsed_opts[$letter] = true;
                }
            }
        }
        
        // add any trailing entries
        if (!is_null($encountered)) {
            $parsed_opts[$encountered] = true;
        }
        
        PHPT_Registry::getInstance()->opts = $parsed_opts;
    }
}
