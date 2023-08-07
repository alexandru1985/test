<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour(): void
    {
        $this->assertEquals(4, 2 + 2);
        $this->assertEquals(8, 3 + 5);
    }

    public function testAddDoesNotReturnTheIncorrectSum(): void
    {
        $this->assertNotEquals(5, 2 + 2);
    }
}