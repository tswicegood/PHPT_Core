<?php

class PHPT_Section_EXPECT_UnexpectedOutputException
    extends PHPT_Section_ExpectationAbstract_UnexpectedOutputException
{
    protected $_message = 'output does not match EXPECT section';
}
