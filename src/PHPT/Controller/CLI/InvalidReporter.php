<?php

class PHPT_Controller_CLI_InvalidReporter extends Exception {
    public function __construct($attempted_reporter) {
        parent::__construct('reporter must implement PHPT_Reporter interface');
    }
}

