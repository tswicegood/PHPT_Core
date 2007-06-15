<?php

interface Test_Reporter
{
    public function onSuccess(Test_Assertion $assertion);
    public function onFailure(Test_Assertion $assertion);
}