<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/29
 * Time: 23:57
 */
require_once ('./vendor/autoload.php');

//$gpio = new \Pi\GPIO();
//$gpio->setRoot("wenchao","passageoftime");
//$gpio->setSetup('wiringPiSetup');
//$gpio->pinMode(1,\Pi\GPIO::OUTPUT);

var_dump(Pi\Util::getBetween("<>","<",">"));