--TEST--
The $data passed in to 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->filename = dirname(__FILE__) . '/fake-test-case.php';

$data = "<?php echo 's', 'k', 'i', 'p'; ?>";
$section = new PHPT_Section_Skipif($data);
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Case_VetoException $e) {
    
}

?>
===DONE===
--EXPECT--
===DONE===
