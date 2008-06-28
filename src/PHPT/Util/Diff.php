<?php

class PHPT_Util_Diff
{
    private $_wanted = array();
    private $_actual = array();
    
    public function __construct($wanted, $actual)
    {
        if ($this->_invalidString($wanted)) {
            throw new PHPT_Util_Diff_InvalidParameter('wanted');
        }
        if ($this->_invalidString($actual)) {
            throw new PHPT_Util_Diff_InvalidParameter('actual');
        }
        $this->_wanted = explode(PHP_EOL, $wanted);
        $this->_actual = explode(PHP_EOL, $actual);
    }
    
    public function __toString()
    {
        if ($this->_cheapComparison()) {
            return '';
        }

        $return = array();
        
        $actual_diff = array_diff_assoc($this->_wanted, $this->_actual);
        $wanted_diff = array_diff_assoc($this->_actual, $this->_wanted);
        
        foreach ($wanted_diff as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $key++;
            $return[sprintf('%03d>', $key)] = sprintf('%03d+ %s', $key, $value);
        }
        
        foreach ($actual_diff as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $key++;
            $return[sprintf('%03d<', $key)] = sprintf('%03d- %s', $key, $value);
        }
        
        ksort($return);
        return implode(PHP_EOL, $return);
    }

    private function _cheapComparison()
    {
        return strcmp(serialize($this->_wanted), serialize($this->_actual)) === 0;
    }

    private function _invalidString($string)
    {
        if (is_string($string)) {
            return false;
        } elseif (is_object($string)) {
            return !(method_exists($string, '__toString') && (string)$string == $string);
        }
        return (string)$string != $string;
    }
}

