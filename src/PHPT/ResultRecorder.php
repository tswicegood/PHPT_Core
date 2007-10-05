<?php

interface PHPT_ResultRecorder
{
    public function registerAssertionHandler(PHPT_AssertionHandler $handler);
    public function onSuccess(PHPT_Assertion $assertion);
    public function onFailure(PHPT_Assertion $assertion);
}
