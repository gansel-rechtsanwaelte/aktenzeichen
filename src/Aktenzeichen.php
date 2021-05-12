<?php

declare(strict_types=1);

namespace Gansel\Aktenzeichen;

use function Symfony\Component\String\u;
use Webmozart\Assert\Assert;

final class Aktenzeichen
{
    /** @var string */
    private $value;

    /**
     * @throws \InvalidArgumentException
     */
    private function __construct(string $value)
    {
        $value = u($value)->trim()->toString();

        Assert::stringNotEmpty($value);
        Assert::notWhitespaceOnly($value);
        Assert::length($value, 7);
        Assert::regex($value, '/[abcdefghkmnprstuvwxyz2345689]/i');

        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function toLowercaseString(): string
    {
        return strtolower($this->value);
    }

    public function toUppercaseString(): string
    {
        return strtoupper($this->value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
