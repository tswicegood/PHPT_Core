<?php

/**
 * Should be implemented by any section wanting to modify the FILE section
 */
interface PHPT_Section_FILEModifier
{
    /**
     * Modifies the provided PHPT_Section_FILE
     *
     * @param PHPT_Section_FILE $file
     */
    public function modifyFile(PHPT_Section_FILE $file);
}
