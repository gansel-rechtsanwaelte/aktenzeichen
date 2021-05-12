# aktenzeichen

This library provides a value object for an Aktenzeichen.

[![CI][ci_badge]][ci_link]

## Installation

```
composer require gansel-rechtsanwaelte/aktenzeichen
```

## Usage

```php
<?php

declare(strict_types=1);

namespace App\Domain\Value\Name;

use Gansel\Aktenzeichen\Aktenzeichen;

final class Akte
{
    /** @var Aktenzeichen */
    private $aktenzeichen;

    // ...

    private function __construct($value)
    {
        $this->aktenzeichen = Aktenzeichen::fromString($value['aktenzeichen']);

        // ...
    }

    public static function fromArray(array $value): self
    {
        return new self($value);
    }

    public function aktenzeichen(): Aktenzeichen
    {
        return $this->aktenzeichen;
    }

    // ...
}
```

[ci_badge]: https://github.com/gansel-rechtsanwaelte/aktenzeichen/workflows/CI/badge.svg?branch=main
[ci_link]: https://github.com/gansel-rechtsanwaelte/aktenzeichen/actions?query=workflow:ci+branch:main
