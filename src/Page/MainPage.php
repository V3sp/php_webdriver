<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 15.08.18
 * Time: 18:29
 */


require_once('PageObject.php');

class MainPage extends PageObject
{
    /**
     * @param string $title
     */
    public function checkTitle($title)
    {
        return $title == $this->driver->getTitle();

    }


    public function clickOnBar()
    {
        $bar = $this->driver->findElement(WebDriverBy::xpath("//*[@id=\"cookie-consent\"]/span/a[2]"));
         if($bar->isEnabled()){
             $bar->click();
         }
    }

    public function goToCarrer()
    {
        $this->clickOnBar();
        $this->click(WebDriverBy::xpath('//*[@id="action_insert_1529069212966867"]/div/div/div[2]/div/div[2]/a'));

    }

}
