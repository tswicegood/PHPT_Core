<?php

class PHPT_Section_EXPECTREGEX_UnexpectedOutputException
    extends PHPT_Section_ExpectationAbstract_UnexpectedOutputException
{
    protected $_message = 'output does not match EXPECTREGEX section';
}
