--TEST--
None of the methods in PHPT_Reporter_Null output anything
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

class PHPT_SimpleCase extends PHPT_Case
{
    public function __construct() { }
    public function __destruct() { }
}

class PHPT_SimpleFailureException extends PHPT_Case_FailureException
{
    public function __construct() { }
    public function getDiff() { }
}

class PHPT_SimpleVeto extends PHPT_Case_VetoException
{
    public function __construct() { }
}

class PHPT_SimpleSuite extends PHPT_Suite
{
    public function __construct() { }
    public function __destruct() { }
}

$case = new PHPT_SimpleCase();
$failure = new PHPT_SimpleFailureException();
$veto = new PHPT_SimpleVeto();
$suite = new PHPT_SimpleSuite();

$reporter = new PHPT_Reporter_Null();
$reporter->onSuiteStart($suite);

$reporter->onCaseStart($case);
$reporter->onCasePass($case);
$reporter->onCaseEnd($case);

$reporter->onCaseStart($case);
$reporter->onCaseFail($case, $failure);
$reporter->onCaseEnd($case);

$reporter->onCaseStart($case);
$reporter->onCaseSkip($case, $veto);
$reporter->onCaseEnd($case);

$reporter->onSuiteEnd($suite);

?>
===DONE===
--EXPECT--
===DONE===
