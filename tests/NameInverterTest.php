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
        $this->assertEquals("Name", $this->inverter->invert("Name"));
    }

    public function testGivenFirstLastReturnLastFirst(): void
    {
        $this->assertEquals("Last, First", $this->inverter->invert("First Last"));
    }

    public function testTrimTheNameBeforeProceed(): void
    {
        $this->assertEquals("Name", $this->inverter->invert(" Name"));
    }

    public function testGivenFirstLastWithExtraSpacesReturnLastFirst(): void
    {
        $this->assertEquals("Last, First", $this->inverter->invert("  First  Last"));
    }
}
