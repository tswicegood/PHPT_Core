<?php

abstract class PHPT_Case_FailureException extends Exception
{
    abstract public function getDiff();
}