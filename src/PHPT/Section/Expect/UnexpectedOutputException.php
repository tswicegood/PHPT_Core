<?php

class PHPT_Section_Expect_UnexpectedOutputException
    extends PHPT_Section_ExpectationAbstract_UnexpectedOutputException
{
    protected $_message = 'output does not match EXPECT section';
}
