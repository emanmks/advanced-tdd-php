<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\NameInverter;

class NameInverterTest extends TestCase
{
    public function testGivenNullThrowsAnException(): void
    {
        $this->expectException(TypeError::class);

        $inverter = new NameInverter();
        $inverter->invert(null);
    }

    public function testGivenEmptyReturnEmptyString(): void
    {
        $inverter = new NameInverter();
        $this->assertEquals("", $inverter->invert(""));
    }

    public function testGivenOneWordNameReturnOneWordName(): void
    {
        $inverter = new NameInverter();
        $this->assertEquals("Fulan", $inverter->invert("Fulan"));
    }
}
