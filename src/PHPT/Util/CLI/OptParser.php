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
            if (!is_null($encountered) && $value{0} != '-') {
                $parsed_opts[$encountered] = $value;
                continue;
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
        
        PHPT_Registry::getInstance()->opts = $parsed_opts;
    }
}