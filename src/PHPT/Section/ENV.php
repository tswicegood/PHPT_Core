<?php

class PHPT_Section_ENV extends PHPT_Section_ModifiableAbstract implements PHPT_Section_RunnableBefore
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
    
    public function __construct($data = '')
    {
        parent::__construct($data);
        $this->_raw_data = $data;
    }

    private function _setDefaultValues()
    {
        $this->data = $_ENV;
        foreach ($this->_default_values_to_empty as $key_name) {
            $this->data[$key_name] = '';
        }
    }

    private function _parseProvidedData($data)
    {
        $lines = explode(PHP_EOL, $data);
        foreach ($lines as $line) {
            $pair = explode('=', trim($line), 2);
            $this->data[$pair[0]] = $pair[1];
        }
    }

    private function _evaluateProvidedData($data, $case)
    {
        $data = trim($data);
        $php = new PHPT_Util_Code($data);
        if ($php->isValid()) {
            $data = $php->runAsFile($case->filename . '.env');
        }
        return $data;
    }

    public function run(PHPT_Case $case)
    {
        $this->_setDefaultValues();
        if (!empty($this->_raw_data)) {
            $this->_parseProvidedData(
                $this->_evaluateProvidedData($this->_raw_data, $case)
            );
        }
        $this->data['PATH_TRANSLATED'] = $this->data['SCRIPT_FILENAME'] = $case->filename;
        if (!isset($this->data['PATH'])) {
            $this->data['PATH'] = getenv('PATH');
        }
        parent::run($case);
    }
}
