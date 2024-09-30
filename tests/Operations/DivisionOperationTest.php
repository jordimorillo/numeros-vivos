<?php

declare(strict_types=1);

namespace Tests\Operations;

use NumerosVivos\Exceptions\OddDividendException;
use NumerosVivos\Operations\DivisionOperation;
use PHPUnit\Framework\TestCase;

class DivisionOperationTest extends TestCase
{
    public DivisionOperation $divisionOperation;

    public function setUp(): void
    {
        parent::setUp();
        $this->divisionOperation = new DivisionOperation();
    }

    public function testCanInstantiate(): void
    {
        $this->assertInstanceOf(DivisionOperation::class, $this->divisionOperation);
    }

    public function testCanDivideByTwo(): void
    {
        $result = $this->divisionOperation->handle(4);
        self::assertEquals(2, $result);
    }

    public function testCanRemainStillWhenDividendIsOdd(): void
    {
        $result = $this->divisionOperation->handle(5);
        self::assertEquals(5, $result);
    }
}