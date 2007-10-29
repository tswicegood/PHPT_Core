<?php

interface PHPT_Section_Runnable extends PHPT_Section
{
    public function run(PHPT_Case $case);
    
    public function getPriority();
}
