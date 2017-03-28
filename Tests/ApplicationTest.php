<?php
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 2:56 PM
 */
class ApplicationTest extends TestCase
{

    public function testRun()
    {
        $app = new Application(new \League\Container\Container());
        $app->run();

    }
}
