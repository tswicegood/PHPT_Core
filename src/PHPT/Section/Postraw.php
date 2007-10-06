<?php

class PHPT_Section_Postraw extends PHPT_Section_Post
{
    private $_content_type = null;
    
    public function __construct($data = '')
    {
        $real_data = '';
        $lines = explode("\n", $data);
        $started = false;
        
        foreach ($lines as $line) {
            if (preg_match('/^Content-Type:(.*)/i', $line, $matches)) {
                $this->_content_type = trim($matches[1]);
                continue;
            }
            
            if ($started) {
                $real_data .= "\n";
            }
            $started = true;
            $real_data .= $line;
        }
        parent::__construct($real_data);
    }
    
    public function modifyEnv(PHPT_Section_Env $env, PHPT_Case $case)
    {
        parent::modifyEnv($env, $case);
        if (!is_null($this->_content_type)) {
            $env->data['CONTENT_TYPE'] = $this->_content_type;
        }
    }
}
