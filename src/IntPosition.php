<?php

declare(strict_types=1);

namespace CyrilVerloop\Iterator;

/**
 * Class implementing \Iterator in the form of [integer => object].
 * @template-implements \Iterator<int, mixed>
 */
abstract class IntPosition implements \Iterator
{
    // Properties :

    /**
     * @var int the position.
     */
    protected int $position;

    /**
     * @var mixed[] the list.
     */
    protected array $list;


    // Magic methods :

    /**
     * The constructor.
     */
    public function __construct()
    {
        $this->position = 0;
        $this->list = [];
    }


    // Methods :

    // \Iterator :

    /**
     * Returns the current element.
     * @throws \OutOfRangeException if the current position does not exist or is null.
     * @return mixed the current element.
     */
    public function current(): mixed
    {
        if (isset($this->list[$this->position]) === false) {
            throw new \OutOfRangeException('intPosition.position.notExist');
        }

        return $this->list[$this->position];
    }

    /**
     * Verify whether the current position is valid or not.
     * @return bool whether the current position is valid or not.
     */
    public function valid(): bool
    {
        if (isset($this->list[$this->position]) === false) {
            return false;
        }

        return true;
    }

    /**
     * Move the position to the next element.
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * Returns the current position.
     * @return int the current position.
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Sets the position to the first element.
     */
    public function rewind(): void
    {
        $this->position = 0;
    }


    /**
     * Tells wether the current position is the last one or not.
     * @return bool wether the current position is the last one or not.
     */
    public function currentIsLast(): bool
    {
        if (array_key_last($this->list) !== $this->position) {
            return false;
        }

        return true;
    }
}
