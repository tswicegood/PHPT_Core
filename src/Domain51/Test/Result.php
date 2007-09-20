<?php

class Domain51_Test_Result
{
    private $_data = array();
    
    public function __construct(array $data)
    {
        $this->_data = $data;
    }
    
    public function count($status = null)
    {
        if (is_null($status)) {
            return count($this->_data);
        }
        
        // @todo add count cache
        $count = 0;
        foreach ($this->_data as $test) {
            if ($test['status'] == $status) {
                $count++;
            }
        }
        return $count;
    }
}