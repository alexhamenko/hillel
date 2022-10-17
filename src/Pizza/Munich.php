<?php

namespace Hillel\Pizza;

use Hillel\Interfaces\PizzaInterface;

class Munich implements PizzaInterface
{
    private float $cost;
    private array $ingredients;

    const NAME = 'Munich Pizza';

    public function __construct(float $cost, array $ingredients)
    {
        $this->setCost($cost);
        $this->setIngredients($ingredients);
    }


    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return self::NAME;
    }
}
