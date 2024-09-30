<?php

declare(strict_types=1);

namespace Tests\Operations;

use NumerosVivos\Operations\ReplaceFiveByZero;
use PHPUnit\Framework\TestCase;

class ReplaceFiveByZeroTest extends TestCase
{
    public ReplaceFiveByZero $replaceFiveByZero;

    public function setUp(): void
    {
        parent::setUp();
        $this->replaceFiveByZero = new ReplaceFiveByZero();
    }

    public function testCanReplaceFiveByZero(): void
    {
        $result = $this->replaceFiveByZero->handle(157855);
        self::assertEquals(107800, $result);
    }

    public function testCanRemainStillWhenNoFives(): void
    {
        $result = $this->replaceFiveByZero->handle(117823);
        self::assertEquals(117823, $result);
    }
}