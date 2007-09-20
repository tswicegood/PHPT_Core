<?php

class Domain51_Test_ResultReader_FromFile
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
        return new Domain51_Test_Result($array);
    }
}