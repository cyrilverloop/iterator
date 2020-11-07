# iterator

A simple PHP iterator abstract class requiring PHP 7.4+.


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
user@host symfony-demo$ composer install -o
user@host symfony-demo$ phive install
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
        $this->list[count($this->list) + 1] = $item;
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
