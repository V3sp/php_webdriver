<?php

/**
 * User: Tomasz Wawrzyniak
 * Date: 13.08.18
 * Time: 20:11
 */

require_once('../vendor/autoload.php');

use PHPUnit\Framework\Assert;

//$caps = array("platform" => "LINUX", "browserName" => "chrome", "version" => "beta");
$caps = DesiredCapabilities::chrome();
$caps->setCapability('acceptSslCerts', false);
$caps->setPlatform('LINUX');
$host = 'http://localhost:4444/wd/hub';

$web_driver = RemoteWebDriver::create(
    $host,
    $caps, 120000
);
$web_driver->get("https://www.f-secure.com/en/welcome");
$web_driver->manage()->timeouts()->implicitlyWait(10);

$web_driver->wait(10);
if ($web_driver->getTitle() === 'F-Secure | Cyber Security Solutions for your Home and Business') {
    $cookie_bar = $web_driver->findElement(WebDriverBy::xpath("//*[@id=\"cookie-consent\"]/span/a[2]"));
    $cookie_bar->click();
    $web_driver->wait(5);

    $element = $web_driver->findElement(WebDriverBy::cssSelector("#action_insert_1529069212966867 > div > div > div:nth-child(2) > div > div.media-body.text-left.p-l-1 > a"));
    if ($element->isEnabled()) {
        $web_driver->wait(10);
        $element->click();
        $web_driver->wait(15);
        if ($element = $web_driver->findElement(WebDriverBy::xpath("//*[@id=\"p_p_id_56_INSTANCE_gJitE6b6gf8s_\"]/div/div/div/div[1]/section/div/div[2]/div[2]/div/a"))) {
            $element->click();
            $web_driver->wait(10);
            if ($element = $web_driver->findElement(WebDriverBy::id("job-city"))) {
                $dropdown = $element->findElement(WebDriverBy::cssSelector('select[id="job-city"] option[value=\'Poznań\']'))->click();
                $web_driver->wait(10);
                print $web_driver->getTitle();

                $jobs = $element->findElements(WebDriverBy::xpath("//*[@id=\"job-ads\"]/article"));
                foreach ($jobs as $job) {

                    if ("https://emp.jobylon.com/jobs/16654-f-secure-quality-engineer/" == $job->findElement(WebDriverBy::tagName('a'))->getAttribute('href')) {
                        print 'Tak!!';
                        break;

                    }

                }


            }
        }

    }
}

$web_driver->quit();
