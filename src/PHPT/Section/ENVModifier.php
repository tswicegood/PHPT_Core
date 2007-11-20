<?php

/**
 * Should be implemented by any section wanting to modify PHPT_Section_ENV
 */
interface PHPT_Section_ENVModifier extends PHPT_Section
{
    /**
     * Modifies the provided PHPT_Section_ENV
     *
     * @param PHPT_Section_ENV $env
     */
    public function modifyENV(PHPT_Section_ENV $env);
}

