<?php

class PHPT_Result implements Iterator
{
    private $_data = array();
    
    public function __construct(array $data)
    {
        $this->_data = $data;
    }
    
    /**
     * @todo consider associative arrays as valid type for $status for complex filtering
     */
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
    
    public function current()
    {
        return current($this->_data);
    }
    
    public function key()
    {
        return key($this->_data);
    }
    
    public function next()
    {
        next($this->_data);
    }
    
    public function rewind()
    {
        reset($this->_data);
    }
    
    public function valid()
    {
        return $this->current() !== false;
    }
}
