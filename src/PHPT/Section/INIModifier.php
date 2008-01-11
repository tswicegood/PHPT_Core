<?php

interface PHPT_Section_INIModifier extends PHPT_Section
{
    public function modifyINI(PHPT_Section_INI $ini);
}

