<?php

use Hillel\Interfaces\PizzaInterface;

class PizzaCalculator
{
    public PizzaInterface $pizza;
    public float $price = 0;
    public array $order;
    public array $ingredients = [];

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function add(PizzaInterface $pizza)
    {
        $this->order[] = $pizza->getTitle();
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
        echo $this->pizza->getCost();
    }

    public function printOrder()
    {
        return [
            'Pizzas' => $this->order,
            'Ingredients' => $this->ingredients,
            'Price' => $this->price,
        ];
    }
}