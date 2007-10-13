<?php

interface PHPT_Reporter
{
    /**
     * Called when the Reporter is started
     *
     * Use this method to display any start specific messages, such as number of tests
     * to run, etc.
     *
     * @return string
     */
    public function onStart();
    
    /**
     * Called when the Reporter is finished
     *
     * Use this method to display any end specific messages such as pass/fail/skip tallies,
     * time run, etc.
     *
     * @return string
     */
    public function onEnd();
    
    /**
     * Called when a Case is started
     *
     * @param PHPT_Case $case
     * @return string
     */
    public function onCaseStart(PHPT_Case $case);
    
    /**
     * Called when a Case ends
     *
     * @param PHPT_Case $case
     * @return string
     */
    public function onCaseEnd(PHPT_Case $case);
    
    /**
     * Called when a Case runs without Exception
     *
     * @param PHPT_Case $case
     * @return string
     */
    public function onCasePass(PHPT_Case $case);
    
    /**
     * Called when a PHPT_Case_VetoException is thrown during a Case's run()
     *
     * @param PHPT_Case $case
     * @param PHPT_Case_VetoException $veto
     * @return string
     */
    public function onCaseSkip(PHPT_Case $case, PHPT_Case_VetoException $veto);
    
    /**
     * Called when any Exception other than a PHPT_Case_VetoException is encountered
     * during a Case's run()
     *
     * @param PHPT_Case $case
     * @param Exception $exception
     * @return string
     */
    public function onCaseFail(PHPT_Case $case, Exception $exception);
}