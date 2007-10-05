<?php

class PHPT_Util_ValueDumper
{
    private $_dumped = '';
    
    public function __construct($value)
    {
        if (is_array($value)) {
            $this->_dumpArray($value);
        } elseif (is_object($value)) {
            $this->_dumped = 'object: ' . get_class($value);
        } elseif (is_resource($value)) {
            $this->_dumped = 'resource';
        } else {
            $this->_dumped = var_export($value, true);
        }
    }
    
    public function __toString()
    {
        return $this->_dumped;
    }
    
    private function _dumpArray($array)
    {
        $value_strings = array();
        foreach ($array as $key => $value) {
            $value_strings[] = var_export($key, true) . ' => ' . (string)new PHPT_Util_ValueDumper($value);
        }
        
        $this->_dumped = 'array(' . implode(', ', $value_strings) . ')';
    }
}
