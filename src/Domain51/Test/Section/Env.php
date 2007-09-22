<?php

class Domain51_Test_Section_Env implements Domain51_Test_Section
{
    public $data = array();
    private $_default_values_to_empty = array(
        'REDIRECT_STATUS',
        'QUERY_STRING',
        'PATH_TRANSLATED',
        'SCRIPT_FILENAME',
        'REQUEST_METHOD',
        'CONTENT_TYPE',
        'CONTENT_LENGTH',
        'HTTP_COOKIE',
    );
    
    public function __construct($data)
    {
        $this->data = $_ENV;
        foreach ($this->_default_values_to_empty as $key_name) {
            $this->data[$key_name] = '';
        }
        
        $lines = explode("\n", trim($data));
        foreach ($lines as $line) {
            $pair = explode('=', trim($line), 2);
            $this->data[$pair[0]] = $pair[1];
        }
    }
    
    /**
     * @todo handle POST_RAW section
     * @todo handle POST
     */
    public function run(Domain51_Test_Case $case)
    {
        $this->data['PATH_TRANSLATED'] = $this->data['SCRIPT_FILENAME'] = $case->filename;
        if (isset($case->sections['COOKIE'])) {
            $this->data['HTTP_COOKIE'] = trim($case->sections['COOKIE']);
        }
        if (isset($case->sections['GET'])) {
            $this->data['QUERY_STRING'] = trim($case->sections['GET']);
        }
    }
}