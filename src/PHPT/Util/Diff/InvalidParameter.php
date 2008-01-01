<?php

class PHPT_Util_Diff_InvalidParameter extends Exception
{
    public function __construct($parameter_name)
    {
        parent::__construct('provided $' . $parameter_name . ' value is not a valid string');
    }
}

