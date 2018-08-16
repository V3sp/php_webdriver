<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 15.08.18
 * Time: 19:37
 */
require_once('PageObject.php');

class CarrerPage extends PageObject
{

    public function seeOpenPositions()
    {

        $this->click(WebDriverBy::xpath('//*[@id="p_p_id_56_INSTANCE_gJitE6b6gf8s_"]/div/div/div/div[1]/section/div/div[2]/div[2]/div/a'));

    }

    /**
     * @param string $city
     */
    public function selectCity($city)
    {
        $this->driver->findElement(WebDriverBy::cssSelector('select[id="job-city"] option[value=\'' . $city . '\']'))->click();
    }

    /**
     * @param string $name
     */
    public function checkIsJobExist($name)
    {
        $jobs = $this->driver->findElements(WebDriverBy::xpath("//*[@id=\"job-ads\"]/article"));
        foreach ($jobs as $job) {

            return "https://emp.jobylon.com/jobs/16654-f-secure-quality-engineer/" == $job->findElement(WebDriverBy::tagName('a'))->getAttribute('href');

        }
    }

}
