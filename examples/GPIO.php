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
$gpio = new GPIO();
$gpio->setRootUser('pi', 'raspberry');
var_dump($gpio->pinMode(0,GPIO::OUTPUT));

// digitalWrite
var_dump($gpio->digitalWrite(0,GPIO::HIGH));
