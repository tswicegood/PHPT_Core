<?php

class PHPT_SimpleFileModifier implements PHPT_Section, PHPT_Section_FILEModifier
{
    public function modifyFile(PHPT_Section_FILE $file) {
        echo __METHOD__, " was called\n";
    }
}
