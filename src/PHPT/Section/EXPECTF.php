<?php

/**
 * @todo this needs to be updated to current PHP standards instead of this original
 *       values set forth from PEAR_RunTests
 */
class PHPT_Section_EXPECTF extends PHPT_Section_EXPECTREGEX
{
    private $_real_pattern = '';
    
    public function __construct($data)
    {
        parent::__construct($data);
        $data = preg_quote($data, '/');
        $this->_expected = str_replace(
            array(
                '%i',
                '%s',
                '%d',
                '%f',
                '%x',
            ),
            array(
                '[+-]?[0-9]+',
                '.+',
                '[0-9]+',
                '[+\-]?\.?[0-9]+\.?[0-9]*(E-?[0-9]+)?',
                '[A-Fa-f0-9]+',
            ),
            "/{$data}/"
        );
    }
}
