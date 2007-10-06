<?php

interface PHPT_Section_EnvModifier extends PHPT_Section
{
    public function modifyEnv(PHPT_Section_Env $env, PHPT_Case $case);
}
