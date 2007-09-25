<?php

interface Domain51_Test_Section_Runnable extends Domain51_Test_Section
{
    public function run(Domain51_Test_Case $case);
}