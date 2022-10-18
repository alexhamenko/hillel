<?php

namespace Hillel\Pizza;

use Hillel\Interfaces\PizzaInterface;
use Hillel\Traits\InteractsWithClassName;

class ChickenGrill implements PizzaInterface
{
    use InteractsWithClassName;

    protected string $title;
    protected float $cost;
    protected array $ingredients;

    public function __construct()
    {
        $this->title = $this->splitClassName();
        $this->cost = 194;
        $this->ingredients = [
            'Cheese sauce',
            'Chicken thigh',
            'Fried mushrooms',
            'Cherries',
            'Fried onions',
            'Mozzarella cheese',
            'Parmesan cheese'
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
