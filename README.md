# iterator

A simple PHP iterator abstract class requiring PHP 8.0+.

[![License](https://img.shields.io/github/license/cyrilverloop/iterator)](https://github.com/cyrilverloop/iterator/blob/trunk/LICENSE)
[![Type coverage](https://shepherd.dev/github/cyrilverloop/iterator/coverage.svg)](https://shepherd.dev/github/cyrilverloop/iterator)
[![Minimum PHP version](https://img.shields.io/badge/php-%3E%3D8.0-%23777BB4?logo=php&style=flat)](https://www.php.net/)


## Installation

### As a Composer depedency

In your project directory run
```shellsession
user@host project$ composer require "cyril-verloop/iterator"
```

### For development purposes

```shellsession
user@host ~$ cd [PATH_WHERE_TO_PUT_THE_PROJECT] # E.g. ~/projects/
user@host projects$ git clone https://github.com/cyrilverloop/iterator.git
user@host projects$ cd iterator
user@host iterator$ composer install -o
user@host datatables$ phive install --trust-gpg-keys 4AA394086372C20A,12CE0F1D262429A5,31C7E470E2138192,67F861C3D889C656,C5095986493B4AA0
```


## Usage

You need to extend the abstract class and you can add parameter and return types.

```php
<?php

declare(strict_types=1);

namespace MyNamespace;

use MyNamespace\Item;

class Items extends IntPosition
{
    public function add(Item $item): void
    {
        $this->list[count($this->list)] = $item;
    }

    public function current(): Item
    {
        return parent::current();
    }
}
```

Then, you can use it in a foreach loop :

```php
$items->add($item1);
$items->add($item2);

foreach($items as $item) {
    // Do something.
}
```


## Continuous integration

### Tests

To run the tests :
```shellsession
user@host iterator$ ./tools/phpunit -c ./ci/phpunit.xml
```
The generated outputs will be in `./ci/phpunit/`.
Look at `./ci/phpunit/html/index.html` for code coverage
and `./ci/phpunit/testdox.html` for a verbose list of passing / failing tests.

To run mutation testing, you must run PHPUnit first, then :
```shellsession
user@host doctrine-entities$ ./tools/infection -c./ci/infection.json
```
The generated outputs will be in `./ci/infection/`.

### Static analysis

To do a static analysis :
```shellsession
user@host iterator$ ./tools/psalm -c ./ci/psalm.xml [--report=./psalm/psalm.txt --output-format=text]
```
Use "--report=./psalm/psalm.txt --output-format=text"
if you want the output in a file instead of on screen.

### PHPDoc

To generate the PHPDoc :
```shellsession
user@host iterator$ ./tools/phpdocumentor --config ./ci/phpdoc.xml
```
The generated HTML documentation will be in `./ci/phpdoc/`.

### Standard

All PHP files in this project follows [PSR-12](https://www.php-fig.org/psr/psr-12/).
To indent the code :
```shellsession
user@host doctrine-entities$ ./tools/phpcbf --standard=PSR12 --extensions=php -p ./src/ ./tests/
```
