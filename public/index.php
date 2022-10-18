<?php

use Hillel\Pizza\ChickenGrill;
use Hillel\Pizza\Munich;
use Hillel\Pizza\Mexican;
use Hillel\PizzaCalculator;

require_once __DIR__ . '/../vendor/autoload.php';

$chickenGrill = new ChickenGrill();
$mexican = new Mexican();
$munich = new Munich();

$order = new PizzaCalculator();

$order->add($chickenGrill);
$order->add($mexican);

echo 'Total price of ChickenGrill and Mexican pizzas: ';
$order->price();

$order->add($munich);

echo '<pre>';
print_r($order->getOrder());
echo '</pre>';
