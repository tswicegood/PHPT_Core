--TEST--
If a RETURNS section's data does not match the exitcode by of the Case's result
RETURNS will throw a FailureException
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$exit_code = rand(10, 20);
$php_code = '<?php exit(' . $exit_code . ');';

$case = new PHPT_Case(
    new PHPT_SectionList(array(
        new PHPT_Section_FILE($php_code),
    )),
    dirname(__FILE__) . '/fake-test.phpt'
);
$case->run(new PHPT_Reporter_Null());

$real_exit_code = rand(100, 200);
$returns = new PHPT_Section_RETURNS($real_exit_code);
try {
    $returns->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_FailureException $e) {
    assert('$e->getMessage() == "exit code mismatch"');
    $expected_reason = "expected {$real_exit_code}, received {$exit_code}";
    assert('$e->getReason() == $expected_reason');
}

?>
===DONE===
--EXPECT--
===DONE===


