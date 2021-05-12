<?php

declare(strict_types=1);

namespace Gansel\Aktenzeichen\Tests;

use Ergebnis\Test\Util\Helper;
use Gansel\Aktenzeichen\Aktenzeichen;
use PHPUnit\Framework\TestCase;

final class AktenzeichenTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function fromString(): void
    {
        $faker = self::faker();

        $value = $faker->regexify('[abcdefghkmnprstuvwxyz2345689]{7}');

        $value = strtolower($value);

        if ($faker->boolean) {
            $value = strtoupper($value);
        }

        $string = Aktenzeichen::fromString($value);

        self::assertSame($value, $string->toString());
        self::assertSame(strtoupper($value), $string->toUppercaseString());
        self::assertSame(strtolower($value), $string->toLowercaseString());
    }

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::blank()
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::empty()
     * @dataProvider invalidProvider
     */
    public function fromStringThrowsInvalidArgumentExceptionWithValue(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Aktenzeichen::fromString($value);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public function invalidProvider(): \Generator
    {
        yield 'length-6' => ['2345gf'];
        yield 'length-8' => ['2345gf4h'];
    }
}
