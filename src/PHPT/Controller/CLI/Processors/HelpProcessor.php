<?php

class PHPT_Controller_CLI_Processors_HelpProcessor
{
    public function process()
    {
        if (!isset(PHPT_Registry::getInstance()->opts['help']) &&
            !isset(PHPT_Registry::getInstance()->opts['h'])
        ) {
            return;
        }
        echo <<<END
PHPT v0 usage:
  $ phpt [FILE]
  $ phpt [DIRECTORY]

  -h --help             Display this help text
  -r --recursive        When used with DIRECTORY, recursively scans
                        for .phpt files
  -q --quiet            Loads quiet version of reporter, if available
  --reporter Reporter   Use Reporter to handle out

END;
        exit;
    }
}
