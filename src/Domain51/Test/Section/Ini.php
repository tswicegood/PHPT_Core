<?php

class Domain51_Test_Section_Ini implements Domain51_Test_Section
{
    private $_default_values = array(
        'output_handler' => '',
        'open_basedir' => '',
        'safe_mode' => '0',
        'disable_functions' => '',
        'output_buffering' => 'Off',
        'display_errors' => '1',
        'log_errors' => '0',
        'html_errors' => '0',
        'track_errors' => '1',
        'report_memleaks' => '0',
        'report_zend_debug' => '0',
        'docref_root' => '',
        'docref_ext' => '.html',
        'error_prepend_string' => '',
        'error_append_string' => '',
        'auto_prepend_file' => '',
        'auto_append_file' => '',
        'magic_quotes_runtime' => '0',
        'xdebug.default_enable' => '0',
        'allow_url_fopen' => '1',
    );
    
    public $data = array();
    
    public function __construct($data = '')
    {
        if (!empty($data)) {
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                $pair = explode('=', $line, 2);
                $this->data[trim($pair[0])] = trim($pair[1]);
            }
        }
        
        $this->data = array_merge($this->data, $this->_default_values);
    }
    
    public function run(Domain51_Test_Case $case)
    {
        
    }
}