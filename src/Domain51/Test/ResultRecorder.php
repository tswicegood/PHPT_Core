<?php

interface Domain51_Test_ResultRecorder
{
    public function registerAssertionHandler(Domain51_Test_AssertionHandler $handler);
    public function onSuccess(Domain51_Test_NamedAssertion $assertion);
    public function onFailure(Domain51_Test_NamedAssertion $assertion);
}