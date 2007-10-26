<?php

class PHPT_Section_EXPECTF_UnexpectedOutputException 
    extends PHPT_Section_ExpectationAbstract_UnexpectedOutputException
{
    protected $_message = 'output does not match EXPECTF section';
}
