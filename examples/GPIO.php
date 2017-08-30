<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/29
 * Time: 22:19
 */
require __DIR__ . '../vendor/autoload.php';

use \Pi\GPIO;

// pinMode

$gpio = new Pi\GPIO();
$gpio->setRoot('root', 'mypi');
$gpio->pinMode(0,GPIO::OUTPUT);

