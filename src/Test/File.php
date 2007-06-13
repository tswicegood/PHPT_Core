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
    
    public function __get($key)
    {
        switch ($key) {
            case 'filename' :
                return $this->_filename;
        }
    }
    
    public function __set($key, $value)
    {
        if ($key == 'filename') {
            throw new Test_File_Exception(
                'attempted to set read-only "filename" property'
            );
        }
    }
}

/**
 * @todo move to separate file
 */
class Test_File_Exception extends Exception { }