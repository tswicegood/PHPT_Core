--TEST--
getReason(), by default, is a raw version of the message
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../../Section/_simple-test-case.inc';

$some_random_reason = 'some random reason' . rand(100, 200);

$failure = new PHPT_Case_FailureException(new PHPT_SimpleTestCase(), $some_random_reason);
assert('$failure->getReason() == $some_random_reason');

?>
===DONE===
--EXPECT--
===DONE===

