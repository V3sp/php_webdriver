<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 14.08.18
 * Time: 21:07
 */

class Test extends PHPUnit_Framework_TestCase
{
    /**
     * @var \RemoteWebDriver
     */
    public $webDriver;

    public function __construct($webDriver)
    {
        $this->webDriver = $webDriver;
    }

    public function setUp()
    {
        $this->webDriver->manage()->timeouts()->implicitlyWait(10);
    }

    public function cleanUp()
    {
        $this->webDriver->manage()->deleteAllCookies();
    }

    public function tearDown()
    {
        $this->webDriver->close();
    }

    /**
     * @return \RemoteWebDriver
     */
    public function getWebDriver()
    {
        return $this->webDriver;
    }

    /**
     * @param \RemoteWebDriver $webDriver
     */
    public function setWebDriver($webDriver)
    {
        $this->webDriver = $webDriver;
    }
}
