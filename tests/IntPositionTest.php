<?php

declare(strict_types=1);

namespace CyrilVerloop\Iterator\Tests;

use CyrilVerloop\Iterator\IntPosition;
use CyrilVerloop\Iterator\Tests\Items;
use PHPUnit\Framework\TestCase;

/**
 * Tests the iterator.
 * @package \CyrilVerloop\Iterator\Tests
 *
 * @coversDefaultClass \CyrilVerloop\Iterator\IntPosition
 * @covers ::__construct
 */
class IntPositionTest extends TestCase
{
    // Properties :

    /**
     * @var \CyrilVerloop\Iterator\IntPosition the test subject.
     */
    protected IntPosition $items;


    // Methods :

    /**
     * Initialises tests.
     * @return void
     */
    public function setUp(): void
    {
        $this->items = new Items();
    }


    /**
     * Tests that the cursor position can be changed.
     * @return void
     *
     * @covers ::key
     * @covers ::next
     * @covers ::rewind
     */
    public function testCanChangeTheCursorPosition(): void
    {
        self::assertSame(1, $this->items->key(), 'The default position must be 1.');

        $this->items->next();

        self::assertSame(2, $this->items->key(), 'The position must be 2.');

        $this->items->next();

        self::assertSame(3, $this->items->key(), 'The position must be 3.');

        $this->items->rewind();

        self::assertSame(1, $this->items->key(), 'The position must return to the default : 1.');
    }


    /**
     * Tests that an \OutOfRangeException is thrown
     * if the current position has no item.
     * @return void
     *
     * @covers ::current
     */
    public function testCanThrowAnOutOfRangeExceptionIfTheCurrentPositionHasNoItem(): void
    {
        $this->expectException(\OutOfRangeException::class);
        $this->expectExceptionMessage('intPosition.position.notExist');

        $this->items->current();
    }

    /**
     * Tests that the current item is returned.
     * @return void
     *
     * @covers ::current
     * @covers ::key
     */
    public function testCanReturnTheCurrentItem(): void
    {
        self::assertSame(1, $this->items->key(), 'The current position must be 1.');

        $this->items->add(123);

        self::assertSame(123, $this->items->current(), 'The current item must be 123.');
    }


    /**
     * Tests that the position is invalid.
     * @return void
     *
     * @covers ::valid
     * @covers ::next
     */
    public function testCanHaveAnInvalidPosition(): void
    {
        self::assertFalse($this->items->valid(), 'An empty list can not have a valid position.');

        $this->items->add(123);
        $this->items->next();
        $this->items->next();

        self::assertFalse($this->items->valid(), 'The position must be invalid when it is out of range.');
    }

    /**
     * Tests that the position is valid.
     * @return void
     *
     * @covers ::valid
     */
    public function testCanHaveAValidPosition(): void
    {
        self::assertFalse($this->items->valid(), 'An empty list can not have a valid position.');

        $this->items->add(123);

        self::assertTrue($this->items->valid(), 'The position must be valid.');
    }


    /**
     * Tests that the current position is not the last.
     * @return void
     *
     * @covers ::currentIsLast
     * @covers ::next
     */
    public function testCanHaveCurrentPositionNotAsTheLast(): void
    {
        self::assertFalse(
            $this->items->currentIsLast(),
            'An empty list can not have the current position as the last.'
        );

        $this->items->add(123);
        $this->items->next();
        $this->items->next();

        self::assertFalse($this->items->currentIsLast(), 'The position can not be the last when it is out of range.');
    }


    /**
     * Tests that the current position is the last.
     * @return void
     *
     * @covers ::currentIsLast
     */
    public function testCanHaveCurrentPositionAsTheLast(): void
    {
        self::assertFalse(
            $this->items->currentIsLast(),
            'An empty list can not have the current position as the last.'
        );

        $this->items->add(123);

        self::assertTrue($this->items->currentIsLast(), 'The position must be the last.');
    }
}
