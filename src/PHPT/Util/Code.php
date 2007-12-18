<?php

class PHPT_Util_Code
{
    private $_code = null;
    private $_valid = null;

    public function __construct($code)
    {
        $this->_code = $code;
    }

    public function evaluate()
    {
        if (!$this->isValid()) {
            throw new PHPT_Util_Code_InvalidSyntaxException($this->_code);
        }
        return eval($this->_code);
    }

    /**
     * Returns true if this code represents executable PHP
     *
     * @return bool
     * @internal this was influenced by the code available on the PHP manual's
     *           page about php_check_syntax() as posted by 
     *           nicolas dot grekas+php at gmail dot com
     */
    public function isValid()
    {
        if (is_null($this->_valid)) {
            $code = 'if (false) {' . $this->_code . '}';
            ob_start();
            $this->_valid = (eval($code) !== false);
            ob_get_clean();
        }
        return $this->_valid;
    }
}

