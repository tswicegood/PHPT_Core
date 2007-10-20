#!@php_bin@
<?php
/**
 * @internal this is all devel level code just for testing out on other systems
 */

require_once 'PHPT/Framework.php';

$controller = new PHPT_Controller_CLI();
$controller->run($argv);
