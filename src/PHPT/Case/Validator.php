<?php

interface PHPT_Case_Validator
{
    public function validate(PHPT_Case $case);
    public function is(PHPT_Case $case);
}