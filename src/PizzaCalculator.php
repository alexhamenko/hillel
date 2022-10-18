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

    public function getPizzas(): array
    {
        return $this->pizzasList;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function add(PizzaInterface $pizza)
    {
        $this->pizzasList[] = $pizza->getTitle();
        $this->price += $pizza->getCost();
        $this->addIngredients($pizza);
    }

    public function addIngredients(PizzaInterface $pizza)
    {
        foreach ($pizza->getIngredients() as $ingredient) {
            if (!in_array($ingredient, $this->ingredients)) {
                array_push($this->ingredients, $ingredient);
            }
        }
    }

    public function printPrice()
    {
        echo $this->price;
    }

    public function getOrder(): string
    {
        return json_encode([
            'Pizzas' => $this->getPizzas(),
            'Ingredients' => $this->getIngredients(),
            'Total' => $this->getPrice(),
        ], JSON_PRETTY_PRINT);
    }
}