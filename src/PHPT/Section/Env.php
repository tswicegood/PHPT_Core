<?php

class PHPT_Section_Env implements PHPT_Section_Runnable
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
        $this->data = $_ENV;
        foreach ($this->_default_values_to_empty as $key_name) {
            $this->data[$key_name] = '';
        }
        
        $data = trim($data);
        if (!empty($data)) {
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                $pair = explode('=', trim($line), 2);
                $this->data[$pair[0]] = $pair[1];
            }
        }
    }
    
    /**
     * @todo create Domain51_Section_EnvModifier interface that allows any section
     *       to modify the environment object
     */
    public function run(PHPT_Case $case)
    {
        $this->data['PATH_TRANSLATED'] = $this->data['SCRIPT_FILENAME'] = $case->filename;
        if ($case->sections->filterByInterface('EnvModifier')->valid()) {
            foreach ($case->sections as $section) {
                $section->modifyEnv($this, $case);
            }
        }
        $case->sections->filterByInterface();
    }
}
