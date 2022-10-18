<?php

namespace Hillel\Pizza;

use Hillel\Interfaces\PizzaInterface;

class Munich implements PizzaInterface
{
    protected string $title;
    protected float $cost;
    protected array $ingredients;

    public function __construct()
    {
        $this->title = 'Munich';
        $this->cost = 285;
        $this->ingredients = [
            'Munich sausages',
            'Bavarian sausages',
            'Pepperoni',
            'Cherry tomatoes',
            'Pickles',
            'Onions',
            'Mozzarella cheese',
            'Emmental cheese',
            'Pilatti sauce'
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
