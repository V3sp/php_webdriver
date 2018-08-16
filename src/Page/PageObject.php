<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 15.08.18
 * Time: 18:15
 */
abstract class PageObject
{
    protected $driver;
    public static $seleniumUrl = 'http://hub:4444/wd/hub';
    public static $pageUrl = 'https://www.f-secure.com/en/welcome';

    /**
     * PageObject constructor.
     * @param RemoteWebDriver $driver
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    protected function getElement($path)
    {
        $url = self::$pageUrl . $path;
        $this->driver->get($url)->wait(15);
        return __CLASS__;
    }

    protected function navigateTo()
    {
        return __CLASS__;
    }

    /**
     * @param WebDriverBy $element
     */
    protected function click($element)
    {
        $this->driver->wait()->until(WebDriverExpectedCondition::elementToBeClickable($element));
        $this->driver->findElement($element)->click();
        return __CLASS__;
    }

    /**
     * @param WebDriverBy $element
     * @param String $value
     */
    protected function fill($element, $value)
    {
        $this->click($element);
        $this->driver->findElement($element)->sendKeys($value);
        return __CLASS__;

    }

    public function getTitle()
    {
        return $this->driver->getTitle();
    }

}
