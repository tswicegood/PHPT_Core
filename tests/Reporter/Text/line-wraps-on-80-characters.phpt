--TEST--
After 80 calls to "onCase*" methods, a line feed is outputed
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$case = new PHPT_SimpleTestCase();
$exception = new PHPT_SimpleFailureException();
$veto = new PHPT_Case_VetoException('');

$reporter = new PHPT_Reporter_Text();
for ($i = 0; $i < 180; $i++) {
    $rand = rand(1, 3);
    if ($rand % 3 == 1) {
        $reporter->onCasePass($case);
    } elseif ($rand % 3 == 2) {
        $reporter->onCaseFail($case, $exception);
    } else {
        $reporter->onCaseSkip($case, $veto);
    }
}

echo PHP_EOL;

?>
===DONE===
--EXPECTREGEX--
[\.FS]{80}\n[\.FS]{80}\n[\.FS]{20}
===DONE===
