<?php

/**
 * Created by Primesoft Polska Sp z o.o.
 * User: Tomasz Wawrzyniak
 * Date: 14.08.18
 * Time: 20:55
 */


require_once('../vendor/autoload.php');
require_once('fsecure.php');

$caps = DesiredCapabilities::chrome();
$caps->setCapability('acceptSslCerts', false);
$caps->setPlatform('LINUX');
$host = 'http://localhost:4444/wd/hub';

$web_driver = RemoteWebDriver::create(
    $host,
    $caps, 120000
);

$test = new fsecure($web_driver);
$test->getWebDriver()->get("https://www.f-secure.com/en/welcome");
var_dump($test->checkTitle('F-Secure | Cyber Security Solutions for your Home and Business',$test->getWebDriver()->getTitle()));
var_dump('F-Secure | Cyber Security Solutions for your Home and Business');
var_dump($test->getWebDriver()->getTitle());

