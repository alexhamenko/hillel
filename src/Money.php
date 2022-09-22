<?php

namespace Hillel\Application;

use InvalidArgumentException;

class Money
{
    protected $amount;
    protected Currency $currency;

    public function __construct(Currency $currency, $amount)
    {
        $this->setCurrency($currency);
        $this->setAmount($amount);
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        if (!(is_int($amount) || is_float($amount))) {
            throw new InvalidArgumentException('Amount must be a number');
        }
        $this->amount = $amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param Money $money
     * @return bool
     */
    public function equals(Money $money): bool
    {
        return $money == $this;
    }

    /**
     * @param Money $money
     * @return Money
     */
    public function add(Money $money): Money
    {
        if (!$this->currency->equals($money->currency)) {
            throw new InvalidArgumentException("Currencies must be equal");
        }

        $newAmount = $this->amount + $money->amount;

        return new self($this->currency, $newAmount);
    }
}