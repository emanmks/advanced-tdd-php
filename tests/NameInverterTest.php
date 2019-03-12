<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\NameInverter;

class NameInverterTest extends TestCase
{
    /**
     * @var NameInverter
     */
    private $inverter;

    public function setUp(): void
    {
        $this->inverter = new NameInverter();
        parent::setUp();
    }

    public function testGivenNullThrowsAnException(): void
    {
        $this->expectException(TypeError::class);

        $this->inverter->invert(null);
    }

    public function testGivenEmptyReturnEmptyString(): void
    {
        $this->assertEquals("", $this->inverter->invert(""));
    }

    public function testGivenOneWordNameReturnOneWordName(): void
    {
        $this->assertEquals("Fulan", $this->inverter->invert("Fulan"));
    }
}
