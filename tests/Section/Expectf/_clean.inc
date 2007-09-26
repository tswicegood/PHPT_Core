<?php

$dir = isset($path) ? $path : dirname(__FILE__);
$files = scandir($dir);
foreach ($files as $file) {
    if (preg_match('/^fake-test-case.*/', $file)) {
        unlink($dir . '/' . $file);
    }
}
