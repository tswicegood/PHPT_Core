<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$array = array(
    array(
        'name' => 'assertTrue',
        'status' => 'pass',
        'message' => 'true assertion passed',
    ),
    array(
        'name' => 'assertFalse',
        'status' => 'fail',
        'message' => 'false assertion failed',
    ),
);
