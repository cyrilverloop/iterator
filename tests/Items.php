<?php

declare(strict_types=1);

namespace CyrilVerloop\Iterator\Tests;

use CyrilVerloop\Iterator\IntPosition;

class Items extends IntPosition
{
    public function add($item): void
    {
        $this->list[count($this->list)] = $item;
    }
}
