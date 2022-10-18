<?php

namespace Hillel;

use Hillel\Interfaces\PizzaInterface;

class PizzaCalculator
{
    protected float $price;
    protected array $pizzasList;
    protected array $ingredients;

    public function __construct()
    {
        $this->price = 0;
        $this->pizzasList = [];
        $this->ingredients = [];
    }

    public function add(PizzaInterface $pizza)
    {
        $this->pizzasList[] = $pizza->getTitle();
        $this->price += $pizza->getCost();
        $this->addIngredients($pizza);
    }

    public function addIngredients(PizzaInterface $pizza)
    {
        foreach($pizza->getIngredients() as $ingredient) {
            if( !in_array($ingredient,$this->ingredients))
            {
                array_push($this->ingredients,$ingredient);
            }
        }
    }

    public function ingredients():array
    {
        return $this->ingredients;
    }

    public function price()
    {
        echo $this->price;
    }

    public function getOrder()
    {
        return json_encode([
            'Pizzas' => $this->pizzasList,
            'Ingredients' => $this->ingredients,
            'Total' => $this->price,
        ], JSON_PRETTY_PRINT);
    }
}