<?php

namespace Hillel\Application;

use InvalidArgumentException;

class Currency
{
	protected string $isoCode;

	public function __construct(string $isoCode)
	{
		$this->setIsoCode($isoCode);
	}

	/**
	 * @return string
	 */
	public function getIsoCode(): string
	{
		return $this->isoCode;
	}

	/**
	 * @param string $isoCode
	 */
	public function setIsoCode(string $isoCode): void
	{
		$this->validateIsoCode($isoCode);
		$this->isoCode = $isoCode;
	}

	/**
	 * @param Currency $currency
	 * @return bool
	 */
	public function equals(Currency $currency): bool
	{
		return $currency == $this;
	}

	/**
	 * @param string $isoCode
	 * @return bool
	 */
	public function validateIsoCode(string $isoCode): bool
	{
		if (
			!is_string($isoCode) ||
			strlen($isoCode) !== 3 ||
			!ctype_upper($isoCode)
		) {
			throw new InvalidArgumentException('isoCode must be in ISO 4217 format');
		}
		return true;
	}
}