<?php
/**
 * Created by IntelliJ IDEA.
 * User: wenchao
 * Date: 2017/8/29
 * Time: 22:19
 */
require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use \Pi\GPIO;

// pinMode

$gpio = new Pi\GPIO();
$gpio->setRoot('root', 'mypi');
var_dump($gpio->pinMode(0,GPIO::OUTPUT));

