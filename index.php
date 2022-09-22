<?php

require_once 'autoload.php';

use Hillel\Application\Currency;
use Hillel\Application\Money;

$currency = new Currency('USD');
$money = new Money($currency, 10.5);

print_r($money);

$currency1 = new Currency('USD');
$money1 = new Money($currency1, 10.5);

print_r($money1);

$isMoneyEqual = $money->equals($money1);

var_dump($isMoneyEqual);

$money2 = $money->add($money1);

print_r($money2);

