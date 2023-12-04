<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnitTest\Queue;
use PHPUnitTest\QueueException;

final class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp(): void 
    {
        static::$queue = new Queue;
        static::$queue->clear();
    }

    /**
     * Thi method run after each test 
     */
    protected function tearDown(): void 
    {

    }

    public static function setUpBeforeClass(): void 
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void 
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty() 
    {
        $queue = new Queue;

        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue() 
    {
        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromQueue() 
    {
        static::$queue->push('green');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() 
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded() {
        for($i = 0; $i < Queue::MAX_ITEMS ; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue() {
        for($i = 0; $i < Queue::MAX_ITEMS ; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        static::$queue->push('an item');
    }
}