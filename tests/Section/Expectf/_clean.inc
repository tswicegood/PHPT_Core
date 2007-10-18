<?php

$path = isset($path) ? $path : dirname(__FILE__);
$base = isset($base) ? $base : 'foobar.phpt';

foreach (scandir($path) as $file) {
    if (substr($file, 0, strlen($base)) == $base) {
        unlink("{$path}/{$file}");
    }
}