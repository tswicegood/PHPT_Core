<?php

class PHPT_Section_INI extends PHPT_Section_ModifiableAbstract implements PHPT_Section_RunnableBefore
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
    private $_raw_data = null;
    private $_case = null;
    
    public function __construct($data = '')
    {
        parent::__construct($data);
        $this->_raw_data = $data;
    }
        
    public function run(PHPT_Case $case)
    {
        parent::run($case);
        $this->_case = $case;
        if (!empty($this->_raw_data)) {
            $this->data = $this->_loadFromFileAndParseIni($this->_raw_data);
        } elseif (file_exists($this->_getPhpIni($case))) {
            $this->data = $this->_loadFromFileAndParseIni($this->_getPhpIni($case));
        }

        if (isset(PHPT_Registry::getInstance()->opts['ini'])) {
            $this->data = array_merge(
                $this->_parseIni(PHPT_Registry::getInstance()->opts['ini'], ','),
                $this->data
            );
        }
       
        $this->data = array_merge($this->data, $this->_default_values);
    }

    public function getPriority()
    {
        return 0;    
    }

    private function _loadFromFileAndParseIni($data, $separator = "\n")
    {
        if (is_file($data)) {
            $data = file_get_contents($data);
        } else {
            $php = new PHPT_Util_Code($data);
            if ($php->isValid()) {
                $data = $php->runAsFile($this->_case->filename . '.ini');
                if (is_file($data)) {
                    $data = file_get_contents($data);
                }
            }
        }
        return $this->_parseIni($data, $separator);
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

    private function _getPhpIni(PHPT_Case $case) {
        return dirname($case->filename) . '/php.ini';
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
