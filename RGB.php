<?php

class RGB
{
	private int $red;
	private int $green;
	private int $blue;

	public function __construct(int $red, int $green, int $blue)
	{
		$this->setRed($red);
		$this->setGreen($green);
		$this->setBlue($blue);
	}

	private function setRed(int $redValue)
	{
		$this->validateRGBValue($redValue);
		$this->red = $redValue;
	}

	public function getRed(): int
	{
		return $this->red;
	}

	private function setGreen(int $greenValue)
	{
		$this->validateRGBValue($greenValue);
		$this->green = $greenValue;
	}

	public function getGreen(): int
	{
		return $this->green;
	}

	private function setBlue(int $blueValue)
	{
		$this->validateRGBValue($blueValue);
		$this->blue = $blueValue;
	}

	public function getBlue(): int
	{
		return $this->blue;
	}

	private function validateRGBValue(int $value)
	{
		if ($value < 0) {
			throw new InvalidArgumentException('Argument value is less than 0');
		}
		if ($value > 255) {
			throw new InvalidArgumentException('Argument value is greater than 255');
		}
	}

	public function equals(RGB $objectRGB): bool
	{
		return $objectRGB == $this;
	}

	public static function random(): RGB
	{
		return new RGB(random_int(0, 255), random_int(0, 255), random_int(0, 255));
	}

	public function mix(RGB $objectRGB): RGB
	{
		$mixedRed = round(($this->red + $objectRGB->getRed()) / 2);
		$mixedGreen = round(($this->green + $objectRGB->getGreen()) / 2);
		$mixedBlue = round(($this->blue + $objectRGB->getBlue()) / 2);

		return new RGB($mixedRed, $mixedGreen, $mixedBlue);
	}
}
