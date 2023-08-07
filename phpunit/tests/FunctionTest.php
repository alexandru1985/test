<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FunctionTest extends TestCase
{
    public function testAndReturnsTheCorrectSum(): void
    {
        require 'functions.php';
        $this->assertEquals(4, add(2,2));
    }
}