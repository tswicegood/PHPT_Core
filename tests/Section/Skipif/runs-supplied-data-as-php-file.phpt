--TEST--
The $data passed in to 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new Domain51_Test_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$data = "<?php echo 's', 'k', 'i', 'p'; ?>";
$section = new Domain51_Test_Section_Skipif($data);
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (Domain51_Test_Case_VetoException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===