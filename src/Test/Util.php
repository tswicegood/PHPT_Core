<?php

class Test_Util
{
    public function __construct()
    {
        
    }
    
    static public function parse($code)
    {
        $exploded_code = explode("\n", $code);
        if (count($exploded_code) == 1) {
            // simple regex
            preg_match('/^(<\?(php)?)?(.*)(\?>)?$/', $code, $matches);
            if (substr($matches[3], -2) == '?>') {
                return trim(substr($matches[3], 0, -2));
            }
            return trim($matches[3]);
        }
        
        // first and last line for php process instructions and strip them
        $first_line = array_shift($exploded_code);
        preg_match('/^<\?(php)?(.*)(\?>)?$/', $first_line, $matches);
        if (!empty($matches[2])) {
            array_unshift($exploded_code, $matches[2]);
        }
        
        $last_line = array_pop($exploded_code);
        preg_match('/^(.*)(\?>)$/', $last_line , $matches);
        if (!empty($matches[1])) {
            array_push($exploded_code, $matches[1]);
        }
        
        return trim(implode("\n", $exploded_code));
    }
}