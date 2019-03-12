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
        $this->assertInverted("", "");
    }

    public function testGivenOneWordNameReturnOneWordName(): void
    {
        $this->assertInverted("Name", "Name");
    }

    public function testGivenFirstLastReturnLastFirst(): void
    {
        $this->assertInverted("First Last", "Last, First");
    }

    public function testTrimTheNameBeforeProceed(): void
    {
        $this->assertInverted(" Name", "Name");
    }

    public function testGivenFirstLastWithExtraSpacesReturnLastFirst(): void
    {
        $this->assertInverted("  First  Last", "Last, First");
    }

    public function testIgnoreHonorificName(): void
    {
        $this->assertInverted("Mr. First Last", "Last, First");
    }

    private function assertInverted($actualName, $expectedName): void
    {
        $this->assertEquals($expectedName, $this->inverter->invert($actualName));
    }
}
