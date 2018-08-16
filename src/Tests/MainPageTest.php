<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 15.08.18
 * Time: 18:34
 */

use PHPUnit\Framework\TestCase;

require_once('../Page/MainPage.php');
require_once('../Page/CarrerPage.php');


class MainPageTest extends TestCase
{

    public $driver;

    public function testGoToCarrerPage()
    {

        $caps = DesiredCapabilities::firefox();
        $host = 'http://localhost:4444/wd/hub';
        $this->driver = RemoteWebDriver::create(
            $host,
            $caps, 120000);


        $mainPage = new MainPage($this->driver);

        $this->driver->get($mainPage::$pageUrl);

        $mainPage->goToCarrer();
        $this->driver->wait(5);
        $this->assertSame('Careers | F-Secure', $mainPage->getTitle());

        $carrerPage = new CarrerPage($this->driver);
        $carrerPage->seeOpenPositions();
        $this->assertSame('Job Openings | F-Secure', $carrerPage->getTitle());

        $carrerPage->selectCity('Poznań');

        $carrerPage->checkIsJobExist('https://emp.jobylon.com/jobs/16654-f-secure-quality-engineer/');
        $this->driver->close();
    }


    public function driverProvider()
    {
        return [[DesiredCapabilities::firefox()],[DesiredCapabilities::chrome()]];
    }
}
