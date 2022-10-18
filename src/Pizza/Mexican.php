<?php

namespace Hillel\Pizza;

use Hillel\Interfaces\PizzaInterface;

class Mexican implements PizzaInterface
{
    protected string $title;
    protected float $cost;
    protected array $ingredients;

    public function __construct()
    {
        $this->title = 'Mexican';
        $this->cost = 175;
        $this->ingredients = [
            'Cream cheese sauce',
            'Chicken thigh',
            'Mozzarella cheese',
            'Pineapple and corn salsa',
            'Guacamole',
            'Nachos chips',
            'Green chili pepper',
            'Cilantro'
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }
}
