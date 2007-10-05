<?php

interface PHPT_Case_Validator
{
    /**
     * Validate the provide PHPT_Case
     *
     * validate() should always throw a PHPT_Case_InvalidCaseException if the provide $case
     * does not meet the criteria of the given Validator.  If a true|false return is desired,
     * use {@link is()}.
     *
     * @param PHPT_Case $case
     * @throws PHPT_Case_InvalidCaseException
     * @see is(), PHPT_Case::validate()
     */
    public function validate(PHPT_Case $case);
    
    /**
     * Return TRUE if the provided PHPT_Case is valid, FALSE, otherwise.
     *
     * If the check should stop the execution by throwing an exception, use {@link validate()}.
     *
     * @param PHPT_Case $case
     * @return bool
     * @see validate(), PHPT_Case::is()
     */
    public function is(PHPT_Case $case);
}
