<?php

class PHPT_Section_INI implements PHPT_Section
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
            $this->data = $this->_parseIni($data);
        }

        if (isset(PHPT_Registry::getInstance()->opts['ini'])) {
            $this->data = array_merge(
                $this->_parseIni(PHPT_Registry::getInstance()->opts['ini'], ','),
                $this->data
            );
        }
       
        $this->data = array_merge($this->data, $this->_default_values);
    }

    private function _parseIni($raw_data, $separator = "\n")
    {
        $return = array();
        $lines = explode($separator, $raw_data);
        foreach ($lines as $line) {
            $pair = explode('=', $line, 2);
            $return[trim($pair[0])] = trim($pair[1]);
        }
        return $return;
    }
    
    public function __toString()
    {
        $string = '';
        foreach ($this->data as $key => $value) {
            if (!empty($string)) {
                $string .= " ";
            }
            $string .= "-d \"{$key}={$value}\"";
        }
        return $string;
    }
}
