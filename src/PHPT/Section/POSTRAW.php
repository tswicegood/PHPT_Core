<?php

class PHPT_Section_POSTRAW extends PHPT_Section_POST
{
    private $_content_type = null;
    
    public function __construct($data = '')
    {
        $real_data = '';
        $lines = explode(PHP_EOL, $data);
        $started = false;
        
        foreach ($lines as $line) {
            if (preg_match('/^Content-Type:(.*)/i', $line, $matches)) {
                $this->_content_type = trim($matches[1]);
                continue;
            }
            
            if ($started) {
                $real_data .= PHP_EOL;
            }
            $started = true;
            $real_data .= $line;
        }
        parent::__construct($real_data);
    }
    
    public function modifyEnv(PHPT_Section_ENV $env)
    {
        parent::modifyEnv($env);
        if (!is_null($this->_content_type)) {
            $env->data['CONTENT_TYPE'] = $this->_content_type;
        }
    }
}
