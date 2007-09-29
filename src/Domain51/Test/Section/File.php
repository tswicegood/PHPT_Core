<?php

class Domain51_Test_Section_File implements Domain51_Test_Section
{
    private $_contents = '';
    private $_filename = '';
    
    public function __construct($data)
    {
        $this->_contents = $data;
    }
    
    public function __set($key, $value)
    {
        $trigger_update = false;
        if ($key == 'filename') {
            $this->_filename = $value;
            $trigger_update = true;
        } elseif ($key == 'contents') {
            $this->_contents = $value;
            $trigger_update = true;
        }
        
        if ($trigger_update) {
            file_put_contents($this->_filename, $this->contents);
        }
    }
    
    public function __get($key)
    {
        if ($key == 'contents') {
            return $this->_contents;
        }
    }
}