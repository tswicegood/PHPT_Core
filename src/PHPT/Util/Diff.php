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
        $this->_wanted = explode("\n", $wanted);
        $this->_actual = explode("\n", $actual);
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
        return implode("\n", $return);
    }

    private function _cheapComparison()
    {
        return strcmp(serialize($this->_wanted), serialize($this->_actual)) === 0;
    }

    private function _invalidString($string)
    {
        return !is_string($string) && @((string)$string != $string);
    }
}

