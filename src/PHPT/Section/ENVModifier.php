<?php

interface PHPT_Section_ENVModifier extends PHPT_Section
{
    public function modifyENV(PHPT_Section_ENV $env);
}
