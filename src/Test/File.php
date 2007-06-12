<?php

class Test_File
{
    private $_filename = '';
    
    public function __construct($filename, $contents)
    {
        $this->_filename = $filename;
        $fp = fopen($filename, 'w');
        fwrite($fp, $contents);
        fclose($fp);
    }
    
    public function remove()
    {
        unlink($this->_filename);
    }
}