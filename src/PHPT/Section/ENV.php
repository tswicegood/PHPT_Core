<?php

class PHPT_Section_ENV extends PHPT_Section_ModifiableAbstract
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
        $this->_setDefaultValues();
        if (!empty($data)) {
            $this->_parseProvidedData(
                $this->_evaluateProvidedData($data)
            );
        }
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
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $pair = explode('=', trim($line), 2);
            $this->data[$pair[0]] = $pair[1];
        }
    }

    private function _evaluateProvidedData($data)
    {
        $data = trim($data);
        $php = new PHPT_Util_Code($data);
        if ($php->isValid()) {
            $data = $php->evaluate();
        }
        return $data;
    }

    public function run(PHPT_Case $case)
    {
        $this->data['PATH_TRANSLATED'] = $this->data['SCRIPT_FILENAME'] = $case->filename;
        parent::run($case);
    }
}
