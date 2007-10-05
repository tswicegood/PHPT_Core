<?php

class PHPT_ResultReader_FromFile
{
    public function __construct()
    {
        
    }
    
    public function parse($file)
    {
        $xml = simplexml_load_file($file);
        $array = array();
        foreach ($xml->test as $test) {
            $array[] = array(
                'name' => $test->name,
                'status' => $test->status,
                'message' => $test->message,
            );
        }
        return new PHPT_Result($array);
    }
}
