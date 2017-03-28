<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 1:33 PM
 */

namespace Interfaces;


interface ApplicationInterface
{
    /**
     * This function should load all of the application's dependencies
     *
     */
    public function loadDependencies(): void;

    /**
     * This function should load the apps settings
     *
     */
    public function loadSettings(): void;

    /**This is the method that starts everything...
     * @return void
     */
    public function run(): void;
}